<?php
/* 🔴 NEVER OVER THE WEB. See tests/README.md. */
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }

/**
 * Change approvals (#180) - status stages, the approval date, and votes that start
 * again on resubmission.
 *
 *   php tests/change-approvals.php
 *
 * Runs against the real database. Everything it creates is named ZZ- and is removed
 * in the finally block, whatever happens: changes (their audit, CAB rows and links go
 * with them by cascade) and any ZZ status. It never edits an existing status or change.
 *
 * Every refusal is paired with a positive control, so a rule that refused everything
 * could not pass for a working one.
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/services/changes.php';
require_once __DIR__ . '/../includes/changes/approvals.php';

$pass = 0; $fail = 0;
/**
 * Records one check.
 *
 * @param string $what  what is being proved
 * @param bool $cond  true when it holds
 * @param string $detail  shown on failure
 */
function ok(string $what, bool $cond, string $detail = ''): void {
    global $pass, $fail;
    if ($cond) { $pass++; echo "  PASS  {$what}\n"; }
    else       { $fail++; echo "  FAIL  {$what}" . ($detail ? "  <- {$detail}" : '') . "\n"; }
}

$conn = connectToDatabase();
$made = ['changes' => [], 'statuses' => []];

/** Reads one change row with its status name and stage. */
function zzChange(PDO $conn, int $id): array {
    $s = $conn->prepare("SELECT c.*, cs.name AS status_name, cs.stage AS status_stage
                           FROM changes c LEFT JOIN change_statuses cs ON cs.id = c.status_id WHERE c.id = ?");
    $s->execute([$id]);
    return $s->fetch(PDO::FETCH_ASSOC) ?: [];
}

// Two active analysts to act as voters. Read, never changed.
$voters = $conn->query("SELECT id FROM analysts WHERE is_active = 1 ORDER BY id LIMIT 2")->fetchAll(PDO::FETCH_COLUMN);
if (count($voters) < 2) { echo "Needs two active analysts.\n"; exit(1); }
[$a1, $a2] = array_map('intval', $voters);
$ctx1 = new ActorContext($a1, null, 'ui', 'en', 'ZZ test 1');
$ctx2 = new ActorContext($a2, null, 'ui', 'en', 'ZZ test 2');

echo "\nChange approvals (#180)\n" . str_repeat('=', 70) . "\n";

try {
    // ── Slice A: stages ─────────────────────────────────────────────────────
    echo "\nStatus stages\n";
    $unclassified = $conn->query("SELECT name FROM change_statuses WHERE stage IS NULL AND name IN ('"
        . implode("','", array_keys(CHANGE_STAGE_SEED_NAMES)) . "')")->fetchAll(PDO::FETCH_COLUMN);
    ok('every seeded status name has its stage', $unclassified === [], implode(', ', $unclassified));
    ok('each required stage has an active status', changeStagesWithoutActiveStatus($conn) === []);
    ok('the backfill is idempotent (a second run classifies nothing)', changeStagesBackfill($conn) === 0);
    ok('POSITIVE CONTROL: changeStatusForStage finds an approved status', changeStatusForStage($conn, 'approved') !== null);

    // A ZZ status in the approved stage, ordered first, stands in for "Approved renamed
    // to Authorised": if the code still went by name, a vote would not land on it (F3).
    $conn->prepare("INSERT INTO change_statuses (name, stage, is_closed, colour, is_default, display_order, is_active)
                    VALUES ('ZZ Authorised', 'approved', 0, '#000000', 0, -1000, 1)")->execute();
    $zzStatus = (int)$conn->lastInsertId();
    $made['statuses'][] = $zzStatus;
    ok('the first approved-stage status is now the ZZ one', (changeStatusForStage($conn, 'approved')['id'] ?? 0) === $zzStatus);

    // ── F1: an approval records its date ────────────────────────────────────
    echo "\nF1 - an approval records when it happened\n";
    $id = ChangesService::createChange($conn, $ctx1, 1, ['title' => 'ZZ-F1 manual approval', 'status' => 'Draft']);
    $made['changes'][] = $id;
    ok('POSITIVE CONTROL: a new draft has no approval date', zzChange($conn, $id)['approval_datetime'] === null);
    ChangesService::updateChange($conn, $ctx1, $id, ['status' => 'Approved']);
    $first = zzChange($conn, $id)['approval_datetime'];
    ok('moving it to Approved by hand stamps approval_datetime', $first !== null);
    ChangesService::updateChange($conn, $ctx1, $id, ['status' => 'In Progress']);
    ChangesService::updateChange($conn, $ctx1, $id, ['status' => 'Approved']);
    ok('back from In Progress to Approved keeps the original date', zzChange($conn, $id)['approval_datetime'] === $first);

    $id2 = ChangesService::createChange($conn, $ctx1, 1, ['title' => 'ZZ-F1 created approved', 'status' => 'Approved']);
    $made['changes'][] = $id2;
    ok('a change created straight into Approved is stamped too', zzChange($conn, $id2)['approval_datetime'] !== null);

    // ── F2 + F3: a rejection, a resubmission, then an approval ──────────────
    echo "\nF2 - a resubmission starts the vote again; F3 - the vote lands by stage\n";
    $id3 = ChangesService::createChange($conn, $ctx1, 1, ['title' => 'ZZ-F2 resubmit', 'status' => 'Draft', 'cab_required' => 1]);
    $made['changes'][] = $id3;
    ChangesService::saveCab($conn, $ctx1, $id3, [['analyst_id' => $a1, 'is_required' => true], ['analyst_id' => $a2, 'is_required' => true]]);
    ChangesService::updateChange($conn, $ctx1, $id3, ['status' => 'Pending Approval']);
    $r = ChangesService::voteCab($conn, $ctx1, $id3, ['vote' => 'Reject']);
    ok('a required Reject sends it to a draft-stage status', zzChange($conn, $id3)['status_stage'] === 'draft', json_encode($r));

    ChangesService::updateChange($conn, $ctx1, $id3, ['status' => 'Pending Approval']);
    $left = (int)$conn->query("SELECT COUNT(*) FROM change_cab_members WHERE change_id = {$id3} AND vote IS NOT NULL")->fetchColumn();
    ok('resubmitting clears the earlier votes', $left === 0, "$left vote(s) left");

    ChangesService::voteCab($conn, $ctx1, $id3, ['vote' => 'Approve']);
    ok('one Approve of two required does not decide it yet', zzChange($conn, $id3)['status_stage'] === 'awaiting');
    $r = ChangesService::voteCab($conn, $ctx2, $id3, ['vote' => 'Approve']);
    $row = zzChange($conn, $id3);
    ok('the second Approve approves it (before F2 the old Reject sent it back to Draft)', $row['status_stage'] === 'approved', json_encode($r));
    ok('it lands on the FIRST approved-stage status, found by stage', (int)$row['status_id'] === $zzStatus, $row['status_name'] ?? '');
    ok('and records the approval date', $row['approval_datetime'] !== null);

    // ── Settings: a required stage cannot be emptied ────────────────────────
    echo "\nSettings keep every required stage populated\n";
    $conn->beginTransaction();
    $conn->exec("UPDATE change_statuses SET is_active = 0 WHERE stage = 'awaiting'");
    $missing = changeStagesWithoutActiveStatus($conn);
    $conn->rollBack();
    ok('deactivating every awaiting status is detected', $missing === ['awaiting'], json_encode($missing));
    ok('POSITIVE CONTROL: after the rollback nothing is missing', changeStagesWithoutActiveStatus($conn) === []);
} catch (Throwable $e) {
    ok('no unexpected exception', false, get_class($e) . ': ' . $e->getMessage() . ' @ ' . basename($e->getFile()) . ':' . $e->getLine());
} finally {
    foreach ($made['changes'] as $cid) {
        $conn->prepare("DELETE FROM changes WHERE id = ? AND title LIKE 'ZZ-%'")->execute([$cid]);
    }
    foreach ($made['statuses'] as $sid) {
        $conn->prepare("DELETE FROM change_statuses WHERE id = ? AND name LIKE 'ZZ %'")->execute([$sid]);
    }
    $leftC = (int)$conn->query("SELECT COUNT(*) FROM changes WHERE title LIKE 'ZZ-%'")->fetchColumn();
    $leftS = (int)$conn->query("SELECT COUNT(*) FROM change_statuses WHERE name LIKE 'ZZ %'")->fetchColumn();
    echo "\nTidy: " . ($leftC + $leftS === 0 ? 'nothing left behind' : "LEFT BEHIND: {$leftC} change(s), {$leftS} status(es)") . "\n";
}

echo "\n" . str_repeat('-', 70) . "\n  {$pass} passed, {$fail} failed\n";
exit($fail > 0 ? 1 : 0);
