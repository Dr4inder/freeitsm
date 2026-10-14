<?php
/**
 * Debug Tool D018 — why do the ticket folder counts say 0?
 *
 * The numbers on the inbox's folder list (All Tickets, each status, each
 * department, each analyst, Unassigned) come from one endpoint,
 * api/tickets/get_ticket_counts.php. That endpoint narrows "every ticket" down
 * through several filters, and any ONE of them can take every badge to zero
 * while the install is perfectly healthy. This tool walks the same filters one
 * at a time for a chosen analyst and says which step the tickets disappear at.
 *
 * 🔑 THE COMMONEST CAUSE IS NOT THE DATABASE. An analyst who belongs to a team
 * only sees the departments that team is linked to (department_teams). A team
 * linked to NO department sees nothing - except their own analyst folder,
 * which always counts tickets assigned to them. So "My tickets 153, everything
 * else 0" is the fingerprint of a team with no departments, and the fix is in
 * System → Teams, not in Database Verification.
 *
 * 🔴 ONE COPY OF THE FILTERS. The funnel uses the endpoint's own helpers -
 * ticketTenantFilter(), snoozeHiddenSql() - rather than restating them, so a
 * change to how a filter works changes this report too. When the analyst being
 * checked is the one running it, the REAL endpoint is also called and its
 * numbers printed beside the funnel's, so the two can be seen to agree.
 *
 * READ-ONLY. SELECTs and SHOW COLUMNS only. Nothing is written.
 *
 * Output: plain text, section-delimited with === HEADERS === for easy skimming.
 */

@session_start();

$DIAG_ID   = 'D018';
$DIAG_NAME = 'Ticket folder counts — why do the numbers say 0?';

require_once __DIR__ . '/../../../config.php';
require_once __DIR__ . '/../../../includes/functions.php';
require_once __DIR__ . '/../../../includes/tenancy.php';
require_once __DIR__ . '/../../../includes/ticket_snooze.php';

// Debug tools are administrators-only (issue #34). Fail closed.
try {
    $__dbgAdmin = !empty($_SESSION['analyst_id']) && analystIsAdmin(connectToDatabase(), (int)$_SESSION['analyst_id']);
} catch (Throwable $e) {
    $__dbgAdmin = false;
}
if (!$__dbgAdmin) {
    http_response_code(403);
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo "Administrator access required.\n";
    exit;
}

$sections = [];
/**
 * Adds one titled section ("=== TITLE ===" and its lines) to the report; $body is a
 * string or an array of lines.
 *
 * @param mixed $sections  the report so far, a list of section strings - appended to by reference
 * @param mixed $title  the section heading, printed between === marks
 * @param mixed $body  the section text - a string, or an array of lines
 */
function addSection(&$sections, $title, $body) {
    if (is_array($body)) $body = implode("\n", $body);
    $sections[] = "=== {$title} ===\n" . rtrim($body, "\n");
}
/**
 * Prints every section, separated by blank lines, and stops - the end of the report, and
 * the early exit when a check cannot go on.
 *
 * @param mixed $sections  the report, a list of section strings as built by addSection()
 */
function emit_and_exit($sections) {
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo implode("\n\n", $sections) . "\n";
    exit;
}
/**
 * The columns of one table, or null when the table does not exist.
 *
 * @param PDO $conn  the open database connection
 * @param string $table  the table name (trusted - a literal from this file)
 * @return string[]|null column names, or null for a missing table
 */
function d018Columns(PDO $conn, string $table): ?array {
    try {
        return $conn->query("SHOW COLUMNS FROM `{$table}`")->fetchAll(PDO::FETCH_COLUMN);
    } catch (Throwable $e) {
        return null;
    }
}
/**
 * Run one COUNT(*) and return the number, or the database's own error text.
 *
 * @param PDO $conn  the open database connection
 * @param string $sql  the query, with ? placeholders
 * @param array $params  values for the placeholders, in order
 * @return int|string the count, or "ERROR: ..." when the query fails
 */
function d018Count(PDO $conn, string $sql, array $params = []) {
    try {
        $st = $conn->prepare($sql);
        $st->execute($params);
        return (int)$st->fetchColumn();
    } catch (Throwable $e) {
        return 'ERROR: ' . $e->getMessage();
    }
}
/**
 * Call the real counts endpoint as the signed-in analyst and return its decoded
 * answer. Runs it in this request (no HTTP round trip), from its own folder so
 * its relative require paths resolve, inside a function so its variables stay
 * out of this file's.
 *
 * TRAP: only ever for the analyst who is signed in. Running it for somebody else
 * would mean putting their id into the admin's live session, and a fatal error
 * part-way through would leave the admin signed in as them.
 *
 * @return array{ok:bool,data:?array,raw:string}
 */
function d018RunRealEndpoint(): array {
    $endpoint = dirname(__DIR__, 2) . '/tickets/get_ticket_counts.php';
    $cwd = getcwd();
    // The endpoint calls session_start() too; with ours already open PHP raises a
    // notice, which would land in the JSON. Nothing else is swallowed.
    set_error_handler(function ($no, $msg) {
        return ($no === E_NOTICE || $no === E_WARNING) && stripos($msg, 'session') !== false;
    });
    $savedGet = $_GET;
    $_GET = [];   // no "My tickets" / "Hide closed" view filter - the plain numbers
    ob_start();
    try {
        chdir(dirname($endpoint));
        include $endpoint;
    } catch (Throwable $e) {
        echo 'THROWN: ' . $e->getMessage();
    } finally {
        $raw = (string)ob_get_clean();
        chdir($cwd);
        restore_error_handler();
        $_GET = $savedGet;
    }
    $data = json_decode(trim($raw), true);
    return ['ok' => is_array($data) && !empty($data['success']), 'data' => is_array($data) ? $data : null, 'raw' => $raw];
}

$conn = connectToDatabase();
$me   = (int)$_SESSION['analyst_id'];
$targetInput = trim((string)($_GET['analyst'] ?? ''));
$target = $targetInput === '' ? $me : (int)$targetInput;
$findings = [];   // plain-English problems, gathered for the verdict

// ---- 1. WHO ------------------------------------------------------------
$who = [];
$analyst = null;
try {
    $st = $conn->prepare("SELECT * FROM analysts WHERE id = ?");
    $st->execute([$target]);
    $analyst = $st->fetch(PDO::FETCH_ASSOC) ?: null;
} catch (Throwable $e) {
    $who[] = "Could not read the analysts table: " . $e->getMessage();
}
if (!$analyst) {
    $who[] = "No analyst with id {$target}.";
    addSection($sections, "{$DIAG_ID} · {$DIAG_NAME}", $who);
    emit_and_exit($sections);
}
$who[] = "Analyst checked : " . ($analyst['full_name'] ?? '?') . " (id {$target})" . ($target === $me ? ' - you' : '');
$who[] = "Active          : " . (!empty($analyst['is_active']) ? 'yes' : 'NO');
if (empty($analyst['is_active'])) {
    $findings[] = "The analyst is not active. Inactive analysts are left out of the analyst folder list.";
}
$canTickets = false;
try { $canTickets = analystCanAccessModule($conn, $target, 'tickets'); } catch (Throwable $e) {}
$who[] = "Tickets module  : " . ($canTickets ? 'allowed' : 'NOT ALLOWED');
if (!$canTickets) {
    $findings[] = "The analyst does not have access to the Tickets module, so the counts endpoint refuses them. Grant it in System → Analysts.";
}
$who[] = "PHP version     : " . PHP_VERSION;
addSection($sections, "{$DIAG_ID} · {$DIAG_NAME}", $who);

// ---- 2. SCHEMA ---------------------------------------------------------
// Every table and column get_ticket_counts.php reads. "Optional" ones the
// endpoint copes without (it skips that feature), so they are not failures.
$required = [
    'tickets'          => ['id', 'department_id', 'status_id', 'assigned_analyst_id', 'owner_id', 'deleted_datetime', 'merged_into_id'],
    'ticket_statuses'  => ['id', 'name', 'colour', 'is_closed', 'is_default', 'display_order', 'is_active'],
    'departments'      => ['id', 'name', 'display_order', 'is_active'],
    'analysts'         => ['id', 'full_name', 'is_active'],
    'analyst_teams'    => ['analyst_id', 'team_id'],
    'department_teams' => ['department_id', 'team_id'],
];
$optional = [
    'tickets' => ['snoozed_until' => 'Snoozed folder', 'assigned_team_id' => 'Team grouping', 'tenant_id' => 'multi-company scoping'],
    'teams'   => ['id' => 'Team grouping', 'name' => 'Team grouping', 'display_order' => 'Team grouping'],
];
$schema = [];
$schemaBroken = false;
foreach ($required as $table => $cols) {
    $have = d018Columns($conn, $table);
    if ($have === null) {
        $schema[] = sprintf("%-17s MISSING TABLE", $table);
        $schemaBroken = true;
        continue;
    }
    $missing = array_values(array_diff($cols, $have));
    $schema[] = sprintf("%-17s %s", $table, $missing ? 'MISSING: ' . implode(', ', $missing) : 'ok (' . count($cols) . ' columns checked)');
    if ($missing) $schemaBroken = true;
}
foreach ($optional as $table => $cols) {
    $have = d018Columns($conn, $table) ?? [];
    foreach ($cols as $col => $feature) {
        if (!in_array($col, $have, true)) {
            $schema[] = sprintf("%-17s %s not there - only %s is affected", $table, $col, $feature);
        }
    }
}
if ($schemaBroken) {
    $findings[] = "Tables or columns the counts need are missing. Run System → Database Verification, then run this tool again.";
}
addSection($sections, '1. TABLES AND COLUMNS THE COUNTS READ', $schema);
if ($schemaBroken) {
    addSection($sections, 'VERDICT', array_merge(["Stopped here: the queries below cannot run until the schema is complete."], array_map(function ($f) { return "- {$f}"; }, $findings)));
    emit_and_exit($sections);
}

// ---- 3. THE FUNNEL -----------------------------------------------------
// The same filters, in the same order, as get_ticket_counts.php - but applied
// one at a time so the step that removes the tickets is visible.
$tenantOn = false;
try { $tenantOn = isMultiTenant($conn); } catch (Throwable $e) {}
list($ttSql, $ttParams) = ticketTenantFilter($conn, $target, 't');
$snoozeSql = snoozeHiddenSql($conn, 't');

$teamIds = $conn->prepare("SELECT team_id FROM analyst_teams WHERE analyst_id = ?");
$teamIds->execute([$target]);
$teamIds = array_map('intval', $teamIds->fetchAll(PDO::FETCH_COLUMN));
$hasTeamFilter = count($teamIds) > 0;

$deptIds = [];
if ($hasTeamFilter) {
    $st = $conn->prepare("SELECT DISTINCT dt.department_id FROM department_teams dt
                           INNER JOIN analyst_teams ant ON dt.team_id = ant.team_id
                           WHERE ant.analyst_id = ?");
    $st->execute([$target]);
    $deptIds = array_map('intval', $st->fetchAll(PDO::FETCH_COLUMN));
}

$steps = [];
$where = "1=1"; $params = [];
$steps[] = ['Every ticket in the table', d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE $where", $params)];
$where .= " AND t.deleted_datetime IS NULL";
$steps[] = ['...not in the Trash', d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE $where", $params)];
$where .= " AND t.merged_into_id IS NULL";
$steps[] = ['...not merged into another ticket', d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE $where", $params)];
$where .= $snoozeSql;
$steps[] = ['...not snoozed', d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE $where", $params)];
if ($tenantOn) {
    $where .= $ttSql; $params = array_merge($params, $ttParams);
    $steps[] = ['...in the company the analyst is working in', d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE $where", $params)];
}
$baseWhere = $where; $baseParams = $params;
if ($hasTeamFilter) {
    if ($deptIds) {
        $in = implode(',', array_fill(0, count($deptIds), '?'));
        $total = d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE (t.department_id IN ($in) OR t.department_id IS NULL) AND $where", array_merge($deptIds, $params));
    } else {
        $total = 0;   // the endpoint does not query at all - see get_ticket_counts.php
    }
    $steps[] = ["...in a department the analyst's teams can see (or no department)", $total];
} else {
    $total = $steps[count($steps) - 1][1];
}

$funnel = [];
$prev = null;
foreach ($steps as $i => $s) {
    list($label, $n) = $s;
    $drop = (is_int($n) && is_int($prev) && $n < $prev) ? '   (-' . ($prev - $n) . ')' : '';
    $funnel[] = sprintf("%-68s %s%s", $label, is_int($n) ? number_format($n) : $n, $drop);
    if (is_string($n)) $findings[] = "A count query failed: {$n}";
    $prev = $n;
}
$funnel[] = '';
$funnel[] = "= the number on All Tickets: " . (is_int($total) ? number_format($total) : $total);

$ownAssigned = d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE t.assigned_analyst_id = ? AND $baseWhere", array_merge([$target], $baseParams));
$funnel[] = "  and on the analyst's own folder (\"My tickets\"): " . (is_int($ownAssigned) ? number_format($ownAssigned) : $ownAssigned);
$funnel[] = '';
$funnel[] = "Note: the inbox's \"My tickets\" and \"Hide closed\" view switches narrow every badge further.";
$funnel[] = "They are left off here, so these are the numbers with both switched off.";
addSection($sections, '2. FROM EVERY TICKET TO THE NUMBER ON THE BADGE', $funnel);

if ($tenantOn) {
    $ten = [];
    $ten[] = "This install has more than one company, so tickets are scoped to the one the analyst is working in.";
    if ($target !== $me) {
        $ten[] = "TRAP: the company in use comes from the SIGNED-IN session - yours, not theirs. If their";
        $ten[] = "numbers are wrong only for them, ask them which company their switcher shows.";
    }
    $ten[] = "Filter applied: " . trim($ttSql) . "   params: " . json_encode($ttParams);
    addSection($sections, '3. COMPANIES', $ten);
}

// ---- 4. TEAMS AND DEPARTMENTS ------------------------------------------
$teamLines = [];
if (!$hasTeamFilter) {
    $teamLines[] = "The analyst is in no team, so they see every department. Teams do not narrow their counts.";
} else {
    $teamNames = [];
    try {
        foreach ($conn->query("SELECT id, name FROM teams")->fetchAll(PDO::FETCH_ASSOC) as $r) $teamNames[(int)$r['id']] = $r['name'];
    } catch (Throwable $e) {}
    $teamLines[] = "The analyst is in " . count($teamIds) . " team(s). Being in ANY team limits them to the departments those teams are linked to.";
    $teamLines[] = '';
    foreach ($teamIds as $tid) {
        $st = $conn->prepare("SELECT d.name, d.is_active FROM department_teams dt
                               LEFT JOIN departments d ON d.id = dt.department_id
                               WHERE dt.team_id = ? ORDER BY d.name");
        $st->execute([$tid]);
        $rows = $st->fetchAll(PDO::FETCH_ASSOC);
        $label = ($teamNames[$tid] ?? '(team row missing)') . " (id {$tid})";
        if (!$rows) {
            $teamLines[] = "  {$label}: linked to NO departments";
        } else {
            $names = array_map(function ($r) {
                return ($r['name'] ?? '(department row missing)') . (isset($r['is_active']) && !$r['is_active'] ? ' [inactive]' : '');
            }, $rows);
            $teamLines[] = "  {$label}: " . implode(', ', $names);
        }
    }
    if (!$deptIds) {
        $findings[] = "The analyst is in a team, but none of their teams is linked to a department. That hides every ticket "
                    . "except those assigned to them - which is why their own folder has a number and everything else says 0. "
                    . "Fix: link the team to its departments in System → Teams, or take the analyst out of the team.";
    } else {
        // Tickets sitting in departments this analyst cannot see.
        $in = implode(',', array_fill(0, count($deptIds), '?'));
        $st = $conn->prepare("SELECT d.name, COUNT(*) AS n FROM tickets t
                               INNER JOIN departments d ON d.id = t.department_id
                               WHERE t.department_id NOT IN ($in) AND $baseWhere
                               GROUP BY d.name ORDER BY n DESC");
        $st->execute(array_merge($deptIds, $baseParams));
        $hidden = $st->fetchAll(PDO::FETCH_ASSOC);
        if ($hidden) {
            $teamLines[] = '';
            $teamLines[] = "Tickets in departments the analyst's teams are NOT linked to (left out of their counts):";
            foreach ($hidden as $h) $teamLines[] = sprintf("  %-40s %s", $h['name'], number_format((int)$h['n']));
        }
    }
}
addSection($sections, '4. TEAMS AND THE DEPARTMENTS THEY SEE', $teamLines);

// ---- 5. STATUSES -------------------------------------------------------
// The per-status folders only count statuses that are ACTIVE. A ticket whose
// status is inactive, missing, or empty is in the total but in no child folder.
$stat = [];
$active = $conn->query("SELECT name FROM ticket_statuses WHERE is_active = 1 ORDER BY display_order, id")->fetchAll(PDO::FETCH_COLUMN);
$stat[] = "Active statuses (" . count($active) . "): " . ($active ? implode(', ', $active) : 'NONE');
if (!$active) {
    $findings[] = "No ticket status is active, so there are no status folders to count into. Activate them in Tickets → Settings → Statuses.";
}
$noStatus  = d018Count($conn, "SELECT COUNT(*) FROM tickets t WHERE t.status_id IS NULL AND $baseWhere", $baseParams);
$badStatus = d018Count($conn, "SELECT COUNT(*) FROM tickets t LEFT JOIN ticket_statuses ts ON ts.id = t.status_id
                                WHERE t.status_id IS NOT NULL AND ts.id IS NULL AND $baseWhere", $baseParams);
$offStatus = d018Count($conn, "SELECT COUNT(*) FROM tickets t INNER JOIN ticket_statuses ts ON ts.id = t.status_id
                                WHERE ts.is_active = 0 AND $baseWhere", $baseParams);
$stat[] = "Tickets with no status            : {$noStatus}";
$stat[] = "Tickets whose status row is gone  : {$badStatus}";
$stat[] = "Tickets on an INACTIVE status     : {$offStatus}";
if ((is_int($noStatus) && $noStatus) || (is_int($badStatus) && $badStatus) || (is_int($offStatus) && $offStatus)) {
    $stat[] = "These count towards All Tickets and their department, but appear under no status beneath them.";
}
addSection($sections, '5. STATUSES', $stat);

// ---- 6. THE REAL ENDPOINT ----------------------------------------------
$real = [];
if ($target !== $me) {
    $real[] = "Skipped: the real endpoint can only be called as you. Run this tool for yourself to compare,";
    $real[] = "or ask the analyst to sign in and open: api/tickets/get_ticket_counts.php";
} else {
    $r = d018RunRealEndpoint();
    if (!$r['ok']) {
        $real[] = "The endpoint did NOT return a successful answer. What it sent back:";
        $real[] = substr(trim($r['raw']), 0, 2000);
        $findings[] = "The counts endpoint itself fails (see section 6). The folder list cannot show numbers until it answers.";
    } else {
        $d = $r['data'];
        $real[] = "All Tickets        : " . $d['total_count'] . (is_int($total) && (int)$d['total_count'] !== $total ? "   <- DIFFERS from the funnel ({$total})" : '   (agrees with the funnel)');
        $mine = null;
        foreach ($d['analysts'] ?? [] as $a) if ((int)$a['id'] === $me) $mine = $a['count'];
        $real[] = "My tickets         : " . ($mine ?? '(you are not in the analyst list)');
        $real[] = "Unassigned         : " . $d['unassigned_count'];
        $real[] = "Snoozed / Trash    : " . $d['snoozed_count'] . ' / ' . $d['trash_count'];
        foreach ($d['overall_statuses'] ?? [] as $name => $n) $real[] = sprintf("  %-17s: %s", $name, $n);
    }
}
addSection($sections, '6. THE REAL ENDPOINT (what the inbox is given)', $real);

// ---- VERDICT -----------------------------------------------------------
$verdict = [];
if (!$findings) {
    $verdict[] = "Nothing wrong found. With the view switches off, this analyst should see " . (is_int($total) ? number_format($total) : $total) . " on All Tickets.";
    $verdict[] = "If the inbox still shows 0, check whether \"My tickets\" or \"Hide closed\" is switched on in their inbox,";
    $verdict[] = "and ask them to reload with Ctrl+F5 in case their browser holds an old copy of the page.";
} else {
    foreach ($findings as $f) $verdict[] = "- {$f}";
}
addSection($sections, 'VERDICT', $verdict);
emit_and_exit($sections);
