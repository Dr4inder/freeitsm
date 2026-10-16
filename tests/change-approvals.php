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

    // ── Slice B: text revisions ─────────────────────────────────────────────
    echo "\nText revisions (Part 2)\n";
    $revs = function (int $cid, string $field) use ($conn): array {
        $s = $conn->prepare("SELECT * FROM change_text_revisions WHERE change_id = ? AND field_key = ? ORDER BY id");
        $s->execute([$cid, $field]);
        return $s->fetchAll(PDO::FETCH_ASSOC);
    };
    $id4 = ChangesService::createChange($conn, $ctx1, 1, ['title' => 'ZZ-REV history', 'test_plan' => '<p>plan one</p>']);
    $made['changes'][] = $id4;
    $r = $revs($id4, 'test_plan');
    ok('creating a change records its first revision', count($r) === 1 && $r[0]['content'] === '<p>plan one</p>' && !$r[0]['is_baseline']);
    ok('POSITIVE CONTROL: an empty field on create records nothing', $revs($id4, 'rollback_plan') === []);

    ChangesService::updateChange($conn, $ctx2, $id4, ['test_plan' => '<p>plan two</p>']);
    $r = $revs($id4, 'test_plan');
    ok('an edit records the whole new value, by its editor', count($r) === 2 && $r[1]['content'] === '<p>plan two</p>' && (int)$r[1]['editor_id'] === $a2);
    ok('the old value is still there in full', $r[0]['content'] === '<p>plan one</p>');
    $aud = $conn->query("SELECT field_name, new_value FROM change_audit WHERE change_id = {$id4} AND action_type = 'text_edit' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    ok('the audit trail summarises it and points at the revision', $aud && $aud['field_name'] === 'Test plan' && $aud['new_value'] === 'Revision #' . $r[1]['id'], json_encode($aud));
    ChangesService::updateChange($conn, $ctx2, $id4, ['test_plan' => '<p>plan two</p>']);
    ok('saving identical text records nothing new', count($revs($id4, 'test_plan')) === 2);

    $api = new ActorContext($a1, null, 'api', 'en', 'ZZ api');
    ChangesService::updateChange($conn, $api, $id4, ['test_plan' => '<p>plan three</p>']);
    $r = $revs($id4, 'test_plan');
    ok('an API edit leaves the same history, marked api', end($r)['source'] === 'api');

    // A change from before the upgrade: text, but no revisions. Simulated by removing
    // the ZZ change's own rows.
    $conn->prepare("DELETE FROM change_text_revisions WHERE change_id = ?")->execute([$id4]);
    ChangesService::updateChange($conn, $ctx1, $id4, ['test_plan' => '<p>plan four</p>']);
    $r = $revs($id4, 'test_plan');
    ok('the first edit of old text writes a baseline first', count($r) === 2 && (int)$r[0]['is_baseline'] === 1);
    ok('the baseline holds the text as found, with no editor, source upgrade',
        $r[0]['content'] === '<p>plan three</p>' && $r[0]['editor_id'] === null && $r[0]['source'] === 'upgrade');
    ok('and the edit follows it', $r[1]['content'] === '<p>plan four</p>' && !$r[1]['is_baseline']);

    // The UPDATE and its revision share one transaction: roll back the transaction
    // the save ran in, and neither the text nor the revision survives.
    $before = count($revs($id4, 'test_plan'));
    $conn->beginTransaction();
    ChangesService::updateChange($conn, $ctx1, $id4, ['test_plan' => '<p>never saved</p>']);
    $conn->rollBack();
    ok('a rolled-back save leaves neither the text nor a revision',
        zzChange($conn, $id4)['test_plan'] === '<p>plan four</p>' && count($revs($id4, 'test_plan')) === $before);

    // currentId(): what an approval will point at.
    $cur = ChangeRevisions::currentId($conn, $id4, 'test_plan', '<p>plan four</p>');
    ok('currentId() is the latest revision when it matches', $cur === (int)end($r)['id']);
    $conn->prepare("UPDATE changes SET test_plan = '<p>edited behind the service</p>' WHERE id = ?")->execute([$id4]);
    $cur2 = ChangeRevisions::currentId($conn, $id4, 'test_plan', '<p>edited behind the service</p>');
    $last = $revs($id4, 'test_plan');
    ok('text changed around the service gets a system revision, not a wrong pointer',
        $cur2 !== $cur && end($last)['source'] === 'system' && end($last)['content'] === '<p>edited behind the service</p>');

    // A deleted comment stays in the evidence.
    $cmt = ChangesService::createComment($conn, $ctx2, $id4, ['text' => 'ZZ comment to delete']);
    ChangesService::deleteComment($conn, $ctx1, $cmt, $id4);
    $gone = (int)$conn->query("SELECT COUNT(*) FROM change_comments WHERE id = {$cmt}")->fetchColumn();
    $kept = $revs($id4, 'comment');
    ok('a deleted comment leaves the timeline', $gone === 0);
    ok('but its text and author are kept as a revision', count($kept) === 1 && $kept[0]['content'] === 'ZZ comment to delete' && (int)$kept[0]['editor_id'] === $a2);
    $da = $conn->query("SELECT analyst_id, new_value FROM change_audit WHERE change_id = {$id4} AND action_type = 'comment_deleted'")->fetch(PDO::FETCH_ASSOC);
    ok('and the deletion is audited, by who deleted it', $da && (int)$da['analyst_id'] === $a1 && $da['new_value'] === 'Revision #' . $kept[0]['id']);
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
