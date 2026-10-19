<?php
/* 🔴 NEVER OVER THE WEB. See tests/README.md. */
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }

/**
 * Forms a task occurrence needs (GH #190, phase 1).
 *
 *   php tests/task-forms.php [base-url]
 *
 * Builds a throwaway form ('ZZ-TF ...') and throwaway tasks, and proves, each with
 * a positive control: the requirement uses the form's newest version; the ONE
 * completion gate refuses (block) or warns (warn) while a required form is not
 * submitted, and lets go once it is; the shared draft's revision check turns a
 * stale save into a conflict naming who saved; a stale SUBMIT is a conflict that
 * leaves no submission behind; a retried submit returns the same submission; a
 * correction supersedes; the evidence cannot be deleted from Forms; the repeat
 * copies the requirement without the answers; the frozen record keeps the answers;
 * deleting the task keeps the submission; the company scope hides it from others.
 * With a base URL, drives api/tasks/forms.php over HTTP as an administrator.
 *
 * Tidies everything it made - history included (it outlives tasks, #181) - and
 * restores the settings it changed.
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/rbac.php';
require_once __DIR__ . '/../includes/services/tasks.php';
require_once __DIR__ . '/../includes/services/forms.php';
require_once __DIR__ . '/../includes/services/checklists.php';
require_once __DIR__ . '/../includes/services/task_forms.php';
require_once __DIR__ . '/../includes/task_evidence.php';

$BASE = isset($argv[1]) ? rtrim($argv[1], '/') . '/' : null;
$pass = 0; $fail = 0;
function ok(string $what, bool $cond, string $detail = ''): void {
    global $pass, $fail;
    if ($cond) { $pass++; echo "  PASS  {$what}\n"; }
    else       { $fail++; echo "  FAIL  {$what}" . ($detail ? "  <- {$detail}" : '') . "\n"; }
}
function section(string $t): void { echo "\n{$t}\n"; }

$conn = connectToDatabase();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!TaskForms::columnsReady($conn)) { echo "Run Database Verification first (task_forms / form_submissions.task_id missing).\n"; exit(1); }
$admin = (int)$conn->query("SELECT id FROM analysts WHERE is_active = 1 AND is_admin = 1 ORDER BY id LIMIT 1")->fetchColumn();
$ctx   = new ActorContext($admin, null, 'ui', 'en', 'ZZ forms tester');
$other = new ActorContext($admin, null, 'ui', 'en', 'ZZ second analyst');
$open  = (int)$conn->query("SELECT id FROM task_statuses WHERE is_active=1 AND is_closed=0 ORDER BY is_default DESC, display_order, id LIMIT 1")->fetchColumn();

$tids = []; $formIds = []; $rids = [];
$keys = ['tasks_forms_enabled', 'tasks_evidence_completed_checklist'];
$settingsBefore = $conn->query("SELECT setting_key, setting_value FROM system_settings WHERE setting_key IN ('" . implode("','", $keys) . "')")->fetchAll(PDO::FETCH_KEY_PAIR);

function setSetting(PDO $c, string $k, string $v): void {
    $c->prepare("INSERT INTO system_settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)")->execute([$k, $v]);
}
function zzTask(PDO $c, string $title = 'ZZ-TF occurrence'): int {
    global $tids, $open, $admin;
    $c->prepare("INSERT INTO tasks (title, status_id, due_date, scheduled_date, created_by_id, created_datetime, updated_datetime)
                 VALUES (?, ?, CURDATE(), CURDATE(), ?, UTC_TIMESTAMP(), UTC_TIMESTAMP())")->execute([$title, $open, $admin]);
    return $tids[] = (int)$c->lastInsertId();
}
function cleanup(): void {
    global $conn, $tids, $formIds, $settingsBefore, $keys, $rids;
    try {
        foreach ($rids as $rid) {
            $conn->exec("DELETE FROM task_events WHERE recurrence_id = " . (int)$rid);
            $conn->exec("DELETE FROM task_recurrence_versions WHERE recurrence_id = " . (int)$rid);
            $conn->exec("UPDATE tasks SET recurrence_id = NULL WHERE recurrence_id = " . (int)$rid);
            $conn->exec("DELETE FROM task_recurrences WHERE id = " . (int)$rid);
        }
        if ($tids) {
            $p = implode(',', array_map('intval', $tids));
            $conn->exec("DELETE FROM task_events WHERE task_id IN ($p)");
            $conn->exec("DELETE FROM task_removed_records WHERE task_id IN ($p)");
            $conn->exec("DELETE FROM task_audit WHERE task_id IN ($p)");
            $conn->exec("DELETE FROM task_forms WHERE task_id IN ($p)");
            $conn->exec("DELETE FROM tasks WHERE id IN ($p)");
        }
        if ($formIds) {
            $p = implode(',', array_map('intval', $formIds));
            $conn->exec("DELETE sd FROM form_submission_data sd JOIN form_submissions s ON s.id = sd.submission_id WHERE s.form_id IN ($p)");
            $conn->exec("DELETE FROM form_submissions WHERE form_id IN ($p)");
            $conn->exec("DELETE FROM form_fields WHERE form_id IN ($p)");
            foreach (array_reverse($formIds) as $f) $conn->exec("DELETE FROM forms WHERE id = " . (int)$f);
        }
        $conn->exec("DELETE FROM system_settings WHERE setting_key IN ('" . implode("','", $keys) . "')");
        $ins = $conn->prepare("INSERT INTO system_settings (setting_key, setting_value) VALUES (?, ?)");
        foreach ($settingsBefore as $k => $v) $ins->execute([$k, $v]);
    } catch (Throwable $e) {
        echo "CLEANUP FAILED: " . $e->getMessage() . "\n";
    }
}
register_shutdown_function('cleanup');

function threw(callable $fn, ?string $class = null): ?Throwable {
    try { $fn(); return null; } catch (Throwable $e) { return ($class === null || $e instanceof $class) ? $e : $e; }
}

// ── The form: a daily backup check ──────────────────────────────────────────
$v1 = FormsService::saveForm($conn, $ctx, ['title' => 'ZZ-TF Backup check', 'is_active' => 1, 'fields' => [
    ['field_type' => 'radio', 'label' => 'Result', 'is_required' => 1, 'options' => ['OK', 'Warning', 'Failure']],
    ['field_type' => 'textarea', 'label' => 'Explanation', 'is_required' => 0],
]]);
$formIds[] = $v1['id'];
$v2 = FormsService::createVersion($conn, $ctx, $v1['id']);
$formIds[] = $v2['id'];
$fid = $conn->prepare("SELECT id, label FROM form_fields WHERE form_id = ? ORDER BY sort_order, id");
$fid->execute([$v2['id']]);
$fields = $fid->fetchAll(PDO::FETCH_KEY_PAIR);
$resultField = (int)array_search('Result', $fields, true);
$explField   = (int)array_search('Explanation', $fields, true);

section('1. Switched off, nothing is asked');
setSetting($conn, 'tasks_forms_enabled', '0');
$t1 = zzTask($conn);
$conn->prepare("INSERT INTO task_forms (task_id, form_id, title, is_required, requirement_mode) VALUES (?, ?, 'ZZ-TF Backup check', 1, 'block')")->execute([$t1, $v2['id']]);
ok('the gate ignores task forms while the feature is off', ChecklistsService::taskCompletionCheck($conn, $t1)['blocking'] === []);
$conn->prepare("DELETE FROM task_forms WHERE task_id = ?")->execute([$t1]);
setSetting($conn, 'tasks_forms_enabled', '1');

section('2. Adding a form uses its newest version');
$tf = TaskForms::add($conn, $ctx, $t1, $v1['id'], true, 'block');
$row = TaskForms::row($conn, $tf);
ok('added from version 1, it is filled on version 2 (the leaf)', (int)$row['form_id'] === (int)$v2['id'], 'form_id ' . $row['form_id']);
ok('a second add of the same form is refused', threw(fn() => TaskForms::add($conn, $ctx, $t1, $v2['id'])) instanceof ServiceError);
ok('history: form_added', (int)$conn->query("SELECT COUNT(*) FROM task_events WHERE task_id = $t1 AND event_type = 'form_added'")->fetchColumn() === 1);

section('3. The one completion gate');
$chk = ChecklistsService::taskCompletionCheck($conn, $t1);
ok('a required, blocking form that is not submitted blocks', !empty($chk['blocking']), json_encode($chk));
$e = threw(fn() => ChecklistsService::assertTaskCompletionAllowed($conn, $t1));
ok('...and assertTaskCompletionAllowed() refuses, naming the form', $e instanceof ServiceError && strpos($e->getMessage(), 'ZZ-TF Backup check') !== false, $e ? $e->getMessage() : 'no throw');
TaskForms::update($conn, $ctx, $tf, true, 'warn');
$chk = ChecklistsService::taskCompletionCheck($conn, $t1);
ok('set to warn, it warns and does not block', !$chk['blocking'] && !empty($chk['warning']), json_encode($chk));
TaskForms::update($conn, $ctx, $tf, false, 'block');
ok('optional, it neither blocks nor warns', ChecklistsService::taskCompletionCheck($conn, $t1) === ['blocking' => [], 'warning' => []]);
TaskForms::update($conn, $ctx, $tf, true, 'block');

section('4. The shared draft, and two people at once');
$d = TaskForms::saveDraft($conn, $ctx, $tf, 0, [(string)$resultField => 'Warning']);
ok('a draft saved from revision 0 moves it to 1', $d['revision'] === 1);
$e = threw(fn() => TaskForms::saveDraft($conn, $other, $tf, 0, [(string)$resultField => 'OK']));
ok('a second save from the STALE revision 0 is a conflict', $e instanceof TaskFormConflict, $e ? get_class($e) : 'no throw');
ok('...naming who saved, and carrying their draft', $e instanceof TaskFormConflict && $e->detail['by'] === 'ZZ forms tester'
    && ($e->detail['draft'][(string)$resultField] ?? '') === 'Warning', $e instanceof TaskFormConflict ? json_encode($e->detail) : '');
ok('...and nothing was overwritten', json_decode((string)TaskForms::row($conn, $tf)['draft_json'], true)[(string)$resultField] === 'Warning');
$d = TaskForms::saveDraft($conn, $other, $tf, 1, [(string)$resultField => 'OK']);
ok('"keep mine" saves on top from the revision it was shown (1 -> 2)', $d['revision'] === 2);
ok('the draft says who saved it last', TaskForms::row($conn, $tf)['draft_by_name'] === 'ZZ second analyst');

section('5. Submitting');
$before = (int)$conn->query("SELECT COUNT(*) FROM form_submissions WHERE task_id = $t1")->fetchColumn();
$e = threw(fn() => TaskForms::submit($conn, $ctx, $tf, 1, 'ref-stale', [(string)$resultField => 'OK']));
ok('a submit from a stale revision is a conflict', $e instanceof TaskFormConflict, $e ? $e->getMessage() : 'no throw');
ok('...and leaves NO submission behind (rolled back with it)', (int)$conn->query("SELECT COUNT(*) FROM form_submissions WHERE task_id = $t1")->fetchColumn() === $before);
$e = threw(fn() => TaskForms::submit($conn, $ctx, $tf, 2, 'ref-invalid', [(string)$explField => 'no result given']));
ok('a submit missing a required answer is refused by the Forms validation', $e instanceof ServiceError && !($e instanceof TaskFormConflict), $e ? $e->getMessage() : 'no throw');
ok('...and links nothing', TaskForms::row($conn, $tf)['submission_id'] === null);
$s = TaskForms::submit($conn, $ctx, $tf, 2, 'ref-one', [(string)$resultField => 'Warning', (string)$explField => 'Job 4 retried']);
$sub = $conn->query("SELECT * FROM form_submissions WHERE id = " . (int)$s['submission_id'])->fetch(PDO::FETCH_ASSOC);
ok('submitted: linked to the occurrence, with its retry key', (int)$sub['task_id'] === $t1 && $sub['client_reference'] === 'ref-one');
ok('...on the form version the requirement names', (int)$sub['form_id'] === (int)$v2['id']);
$row = TaskForms::row($conn, $tf);
ok('the requirement is met and the draft cleared', (int)$row['submission_id'] === $s['submission_id'] && $row['draft_json'] === null);
ok('history: form_submitted', (int)$conn->query("SELECT COUNT(*) FROM task_events WHERE task_id = $t1 AND event_type = 'form_submitted'")->fetchColumn() === 1);
$r = TaskForms::submit($conn, $ctx, $tf, 2, 'ref-one', [(string)$resultField => 'Warning']);
ok('a RETRY with the same reference returns the same submission', $r['replayed'] === true && $r['submission_id'] === $s['submission_id']);
ok('...and makes no second one', (int)$conn->query("SELECT COUNT(*) FROM form_submissions WHERE task_id = $t1")->fetchColumn() === $before + 1);
ok('the gate now lets it complete', ChecklistsService::taskCompletionCheck($conn, $t1)['blocking'] === []);
$ans = TaskForms::answers($conn, $s['submission_id']);
ok('answers read back with their labels', count($ans) === 2 && $ans[0]['label'] === 'Result' && $ans[0]['value'] === 'Warning', json_encode($ans));

section('6. Correcting a submission');
$fill = TaskForms::forFill($conn, $tf);
ok('the fill page starts from what was submitted', ($fill['prefill'][(string)$resultField] ?? '') === 'Warning');
$s2 = TaskForms::submit($conn, $ctx, $tf, $fill['revision'], 'ref-two', [(string)$resultField => 'Failure', (string)$explField => 'Job 4 failed again']);
ok('a correction replaces it on the task', (int)TaskForms::row($conn, $tf)['submission_id'] === $s2['submission_id']);
ok('...the old one is kept, marked superseded', (int)$conn->query("SELECT superseded_by_id FROM form_submissions WHERE id = " . (int)$s['submission_id'])->fetchColumn() === $s2['submission_id']);
ok('history: form_replaced', (int)$conn->query("SELECT COUNT(*) FROM task_events WHERE task_id = $t1 AND event_type = 'form_replaced'")->fetchColumn() === 1);

section('7. The evidence cannot be deleted from Forms');
$e = threw(fn() => FormsService::deleteSubmission($conn, $ctx, $s2['submission_id']));
ok('deleting the submission is refused', $e instanceof ServiceError && $e->errorCode === 'task_evidence', $e ? $e->getMessage() : 'no throw');
$e = threw(fn() => FormsService::deleteForm($conn, $ctx, $v2['id']));
ok('deleting the form is refused', $e instanceof ServiceError && $e->errorCode === 'task_evidence', $e ? $e->getMessage() : 'no throw');
$plain = FormsService::submitForm($conn, $ctx, $v2['id'], [(string)$resultField => 'OK']);
ok('control: an ordinary submission (no task) still submits and deletes', FormsService::deleteSubmission($conn, $ctx, $plain) === $plain);

section('8. The repeat copies the requirement, not the answers');
$t2 = zzTask($conn, 'ZZ-TF next occurrence');
$v3 = FormsService::createVersion($conn, $ctx, $v2['id']);
$formIds[] = $v3['id'];
TaskForms::copyForOccurrence($conn, $t1, $t2);
$n = $conn->query("SELECT * FROM task_forms WHERE task_id = $t2")->fetch(PDO::FETCH_ASSOC);
ok('the next occurrence needs the same form', $n && (int)$n['is_required'] === 1 && $n['requirement_mode'] === 'block');
ok('...unanswered, with no draft', $n && $n['submission_id'] === null && $n['draft_json'] === null);
ok('...on the form\'s newest version at that moment', $n && (int)$n['form_id'] === (int)$v3['id'], $n ? $n['form_id'] : '');
ok('...so the next occurrence is blocked until it is filled in', !empty(ChecklistsService::taskCompletionCheck($conn, $t2)['blocking']));

section('9. The frozen record, and deleting the task');
$snap = TaskHistory::snapshot($conn, $t1);
ok('the #181 snapshot carries the forms', isset($snap['forms']['requirements'][0]) && count($snap['forms']['submissions']) === 2);
ok('...with the answers and their labels', ($snap['forms']['submissions'][1]['answers'][0]['value'] ?? '') === 'Failure');
TasksService::deleteTask($conn, $ctx, $t2);
$tids = array_values(array_diff($tids, [$t2]));
ok('deleting a task removes its requirements', (int)$conn->query("SELECT COUNT(*) FROM task_forms WHERE task_id = $t2")->fetchColumn() === 0);
$conn->exec("DELETE FROM task_events WHERE task_id = $t2");
$conn->exec("DELETE FROM task_removed_records WHERE task_id = $t2");

section('10. Company scope in the Forms lists');
[$sql, $args] = TaskForms::submissionScopeSql($conn, [987654], 's');
$q = $conn->prepare("SELECT COUNT(*) FROM form_submissions s WHERE s.form_id = ? AND $sql");
$q->execute(array_merge([$v2['id']], $args));
ok('an analyst of another company does not see the task\'s submissions', (int)$q->fetchColumn() === 0);
[$sql, $args] = TaskForms::submissionScopeSql($conn, null, 's');
$q = $conn->prepare("SELECT COUNT(*) FROM form_submissions s WHERE s.form_id = ? AND $sql");
$q->execute(array_merge([$v2['id']], $args));
ok('control: an all-companies analyst sees both', (int)$q->fetchColumn() === 2);

section('11. The access rule');
ok('an administrator may read the answers', TaskForms::mayReadAnswers($conn, $admin));
$noForms = null;
foreach ($conn->query("SELECT id FROM analysts WHERE is_active = 1 AND is_admin = 0 ORDER BY id")->fetchAll(PDO::FETCH_COLUMN) as $aid) {
    if (analystModuleLevel($conn, (int)$aid, 'forms') === null && !analystMayAct($conn, (int)$aid, Cap::TASKS_FORM_ANSWERS)) { $noForms = (int)$aid; break; }
}
if ($noForms) {
    ok("an analyst with neither Forms nor the permission may not (#$noForms)", !TaskForms::mayReadAnswers($conn, $noForms));
    $list = TaskForms::forTask($conn, $t1, $noForms, true);
    ok('...and forTask() gives them the state but no answers', isset($list[0]) && $list[0]['may_read'] === false && !isset($list[0]['answers']));
} else {
    echo "  SKIP  no analyst here lacks Forms access, so the negative case cannot be shown on this data\n";
}
ok('Read form answers on tasks is always restricted (granted only by a role)', capActionRestricted($conn, Cap::TASKS_FORM_ANSWERS) === true);

section('12. A finished task\'s forms follow the #181 lock');
setSetting($conn, 'tasks_evidence_completed_checklist', 'refuse');
$closed = (int)$conn->query("SELECT id FROM task_statuses WHERE is_active=1 AND is_closed=1 ORDER BY display_order, id LIMIT 1")->fetchColumn();
$conn->exec("UPDATE tasks SET status_id = $closed WHERE id = $t1");
$e = threw(fn() => TaskForms::saveDraft($conn, $ctx, $tf, (int)TaskForms::row($conn, $tf)['revision'], []));
ok('with "refused until reopened", a done task\'s form cannot be changed', $e instanceof ServiceError, $e ? $e->getMessage() : 'no throw');
setSetting($conn, 'tasks_evidence_completed_checklist', 'allow');
$d = TaskForms::saveDraft($conn, $ctx, $tf, (int)TaskForms::row($conn, $tf)['revision'], []);
ok('control: allowed, it can', $d['revision'] > 0);

section('12b. The #181 evidence report carries the forms');
$conn->exec("INSERT INTO task_recurrences (mode, freq, interval_n, ends_mode, occurrences_created, is_active, created_datetime, updated_datetime)
             VALUES ('schedule', 'daily', 1, 'never', 1, 1, UTC_TIMESTAMP(), UTC_TIMESTAMP())");
$rid = $rids[] = (int)$conn->lastInsertId();
$conn->exec("UPDATE tasks SET recurrence_id = $rid WHERE id = $t1");
$rep = TaskEvidence::report($conn, $rid, date('Y-m-d', strtotime('-3 days')), date('Y-m-d', strtotime('+1 day')), $admin);
$row = null;
foreach ($rep['rows'] as $x) if ((int)($x['task_id'] ?? 0) === $t1) $row = $x;
ok('the occurrence row lists its form', $row && ($row['forms'][0]['title'] ?? '') === 'ZZ-TF Backup check', $row ? json_encode($row['forms'] ?? null) : 'no row');
ok('...with who submitted it and the answers, for a viewer who may read them', $row && ($row['forms'][0]['answers'][0]['value'] ?? '') === 'Failure');
ok('...and the earlier submission it replaced is counted', $row && (int)($row['forms'][0]['earlier'] ?? 0) === 1);
if ($noForms) {
    $rep2 = TaskEvidence::report($conn, $rid, date('Y-m-d', strtotime('-3 days')), date('Y-m-d', strtotime('+1 day')), $noForms);
    $row2 = null;
    foreach ($rep2['rows'] as $x) if ((int)($x['task_id'] ?? 0) === $t1) $row2 = $x;
    ok('for a viewer who may not: submitted, by whom - but no answers', $row2 && $row2['forms'][0]['answers'] === null && $row2['forms'][0]['answers_hidden'] === true
        && ($row2['forms'][0]['by'] ?? '') !== '', $row2 ? json_encode($row2['forms'][0]) : 'no row (company scope?)');
}

if ($BASE) {
    section('13. Over HTTP (api/tasks/forms.php)');
    $sess = 'zztf' . bin2hex(random_bytes(3));
    $sessDir = rtrim((string)(ini_get('session.save_path') ?: sys_get_temp_dir()), '/\\');
    $name = 'ZZ forms tester';
    file_put_contents("$sessDir/sess_$sess", 'analyst_id|i:' . $admin . ';analyst_name|s:' . strlen($name) . ':"' . $name . '";csrf_token|s:8:"zztfcsrf";');
    $http = function (string $path, ?array $body = null) use ($BASE, $sess) {
        $ch = curl_init($BASE . 'api/tasks/' . $path);
        curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_COOKIE => "PHPSESSID=$sess", CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json', 'X-CSRF-Token: zztfcsrf']]);
        if ($body !== null) { curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); }
        $raw = (string)curl_exec($ch); curl_close($ch);
        return [json_decode($raw, true), $raw];
    };
    $conn->exec("UPDATE tasks SET status_id = $open WHERE id = $t1");
    [$g, $raw] = $http('forms.php?task_id=' . $t1 . '&answers=1');
    ok('GET lists the task\'s form with its answers', ($g['forms'][0]['answers'][0]['value'] ?? '') === 'Failure', substr($raw, 0, 200));
    [$c, $raw] = $http('checklists.php?task_id=' . $t1 . '&check=complete');
    ok('the window\'s completion check sees the forms gate (met: nothing blocking)', isset($c['blocking']) && $c['blocking'] === [], substr($raw, 0, 200));
    $rev = (int)TaskForms::row($conn, $tf)['revision'];
    [$p, $raw] = $http('forms.php', ['action' => 'draft', 'task_form_id' => $tf, 'revision' => $rev - 1, 'answers' => []]);
    ok('a stale draft over HTTP answers with the conflict and who saved', ($p['code'] ?? '') === 'task_form_conflict' && isset($p['conflict']['by']), substr($raw, 0, 200));
    [$p, $raw] = $http('forms.php', ['action' => 'draft', 'task_form_id' => $tf, 'revision' => $rev, 'answers' => [(string)$resultField => 'OK']]);
    ok('a current one saves', !empty($p['success']) && ($p['revision'] ?? 0) === $rev + 1, substr($raw, 0, 200));
    $ch = curl_init($BASE . 'api/tasks/evidence_export.php?series=' . $rid . '&file=form_answers&from=' . date('Y-m-d', strtotime('-3 days')) . '&to=' . date('Y-m-d', strtotime('+1 day')));
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_COOKIE => "PHPSESSID=$sess"]);
    $csv = (string)curl_exec($ch); curl_close($ch);
    ok('the form answers CSV has the question and the answer', strpos($csv, 'Explanation') !== false && strpos($csv, 'Job 4 failed again') !== false, substr($csv, 0, 300));
    @unlink("$sessDir/sess_$sess");
}

echo "\n{$pass} passed, {$fail} failed\n";
exit($fail ? 1 : 0);
