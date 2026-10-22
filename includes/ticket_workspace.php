<?php
/** Personal presentation only. A URL preview never writes a preference. */
function ticketWorkspaceResolve(?string $saved, ?string $requested): string
{
    $layouts = ['inbox', 'workspace'];
    if (in_array($requested, $layouts, true)) return $requested;
    return in_array($saved, $layouts, true) ? $saved : 'inbox';
}

function ticketWorkspaceLayout(PDO $conn, int $analystId, ?string $requested): string
{
    $stmt = $conn->prepare('SELECT preference_value FROM user_preferences WHERE analyst_id = ? AND preference_key = ?');
    $stmt->execute([$analystId, 'tickets_detail_layout']);
    $saved = $stmt->fetchColumn();
    return ticketWorkspaceResolve($saved === false ? null : (string)$saved, $requested);
}

function ticketWorkspaceSelector(string $layout): string
{
    $h = fn(string $s): string => htmlspecialchars($s, ENT_QUOTES);
    $html = '<label class="tw-layout-label" for="ticketLayoutSelect">' . $h(t('tickets.workspace.layout')) . '</label>';
    $html .= '<select id="ticketLayoutSelect" class="action-row-search" onchange="TicketWorkspace.requestMode(this.value)">';
    foreach (['inbox', 'workspace'] as $value) {
        $html .= '<option value="' . $value . '"' . ($layout === $value ? ' selected' : '') . '>' . $h(t('tickets.workspace.' . $value)) . '</option>';
    }
    return $html . '</select>';
}
