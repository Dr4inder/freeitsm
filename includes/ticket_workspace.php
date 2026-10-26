<?php
/** Ticket workspace policy. The install opts in before any analyst's view changes. */
enum TicketWorkspaceMode: string
{
    case Off = 'off';
    case Selected = 'selected';
    case All = 'all';
}

/** A missing preference opts in; only an explicit zero opts out. */
function ticketWorkspacePersonal($value): bool
{
    return $value !== '0' && $value !== 0 && $value !== false;
}

function ticketWorkspaceEnabled(TicketWorkspaceMode $mode, bool $personal, bool $flag): bool
{
    return $personal && ($mode === TicketWorkspaceMode::All
        || ($mode === TicketWorkspaceMode::Selected && $flag));
}

/** New code can arrive before Database Verification. Never break ticket reads. */
function ticketWorkspaceReady(PDO $conn): bool
{
    static $ready = null;
    if ($ready === null) {
        try {
            $conn->query('SELECT is_workspace FROM tickets LIMIT 0');
            $ready = true;
        } catch (Throwable) {
            $ready = false;
        }
    }
    return $ready;
}

function ticketWorkspaceMode(PDO $conn): TicketWorkspaceMode
{
    try {
        $stmt = $conn->query("SELECT setting_value FROM system_settings WHERE setting_key = 'ticket_workspace_mode'");
        return TicketWorkspaceMode::tryFrom((string)$stmt->fetchColumn()) ?? TicketWorkspaceMode::Off;
    } catch (Throwable) {
        return TicketWorkspaceMode::Off;
    }
}

/** The two switches are independent; changing the install mode never clears a ticket flag. */
function ticketWorkspaceConfig(PDO $conn, int $analystId): array
{
    $personal = true;
    try {
        $stmt = $conn->prepare("SELECT preference_value FROM user_preferences WHERE analyst_id = ? AND preference_key = 'ticket_workspace'");
        $stmt->execute([$analystId]);
        $value = $stmt->fetchColumn();
        $personal = ticketWorkspacePersonal($value === false ? null : $value);
    } catch (Throwable) {
        // Existing installs may not have created the preferences table yet.
    }
    return ['mode' => ticketWorkspaceMode($conn)->value, 'personal' => $personal, 'ready' => ticketWorkspaceReady($conn)];
}
