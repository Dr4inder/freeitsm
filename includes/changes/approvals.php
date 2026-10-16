<?php
/**
 * Change approvals - the rules that decide where a change may go, and the stage
 * of each status that those rules are written against.
 *
 * WHY STAGES
 * ----------
 * Statuses are rows an administrator can rename (Settings → Statuses). Code that
 * looked for the name 'Approved' or 'Pending Approval' was one rename away from
 * switching itself off - rename Approved to Authorised and a deciding CAB vote set
 * the change's status to NULL. So every status carries a STAGE, chosen in Settings,
 * and the code only ever asks about the stage:
 *
 *   draft         being written                     Draft, Submitted
 *   awaiting      submitted; waiting on a decision  Pending Approval
 *   approved      authorised, not started           Approved
 *   implementing  the work is happening             Scheduled, In Progress
 *   done          finished                          Completed, Failed
 *   stopped       ended without implementing        Rejected, Cancelled
 *
 * NULL means "not classified yet" - a custom status, or a seeded one renamed before
 * stages existed. It is shown loudly in Settings rather than guessed, because
 * guessing "draft" for an unknown "Authorised" would hand everybody the one status
 * approval exists to protect.
 *
 * Design: wiki Approvals-and-Evidence-1-Change-Approvals §3.
 */

require_once __DIR__ . '/../i18n.php';   // t() for the refusal messages

/** Every stage, in lifecycle order. TRAP: the order is the order shown in Settings. */
const CHANGE_STAGES = ['draft', 'awaiting', 'approved', 'implementing', 'done', 'stopped'];

/** Stages that must always keep at least one active status, because code moves changes into them. */
const CHANGE_STAGES_REQUIRED = ['draft', 'awaiting', 'approved'];

/** Stages whose statuses are closed (finished) - is_closed follows the stage. */
const CHANGE_STAGES_CLOSED = ['done', 'stopped'];

/**
 * The stage each SEEDED status name belongs to. Used once per status, to classify a
 * status that has no stage yet; never to read a stage back.
 */
const CHANGE_STAGE_SEED_NAMES = [
    'Draft'            => 'draft',
    'Submitted'        => 'draft',
    'Pending Approval' => 'awaiting',
    'Approved'         => 'approved',
    'Scheduled'        => 'implementing',
    'In Progress'      => 'implementing',
    'Completed'        => 'done',
    'Failed'           => 'done',
    'Rejected'         => 'stopped',
    'Cancelled'        => 'stopped',
];

/**
 * Is this a real stage key? NULL (unclassified) is not.
 *
 * @param mixed $stage  a value from a request or a row
 */
function changeStageIsValid($stage): bool
{
    return is_string($stage) && in_array($stage, CHANGE_STAGES, true);
}

/**
 * The status a change is moved to when the code needs "the X stage": the first
 * active status in that stage by display order. Null when the stage has none, which
 * Settings prevents for the required stages (CHANGE_STAGES_REQUIRED).
 *
 * @param string $stage  one of CHANGE_STAGES
 * @return ?array  ['id' => int, 'name' => string] or null
 */
function changeStatusForStage(PDO $conn, string $stage): ?array
{
    $stmt = $conn->prepare(
        "SELECT id, name FROM change_statuses
          WHERE stage = ? AND is_active = 1
          ORDER BY display_order, id LIMIT 1"
    );
    $stmt->execute([$stage]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? ['id' => (int)$row['id'], 'name' => $row['name']] : null;
}

/**
 * The required stages (CHANGE_STAGES_REQUIRED) that currently have no active status.
 * Settings refuses any save or delete that would leave one empty.
 *
 * @return string[]  stage keys, empty when all is well
 */
function changeStagesWithoutActiveStatus(PDO $conn): array
{
    $have = $conn->query("SELECT DISTINCT stage FROM change_statuses WHERE is_active = 1 AND stage IS NOT NULL")
                 ->fetchAll(PDO::FETCH_COLUMN);
    return array_values(array_diff(CHANGE_STAGES_REQUIRED, $have));
}

/**
 * The refusal shown when a save or delete would empty a required stage.
 *
 * @param string[] $stages  stage keys from changeStagesWithoutActiveStatus()
 */
function changeStagesMissingMessage(array $stages): string
{
    $names = array_map(fn($s) => t('change-management.stage.' . $s), $stages);
    return t('change-management.settings.stage_required_error', ['stages' => implode(', ', $names)]);
}

/**
 * Classify every status that has no stage but still carries a seeded name. Called by
 * Database Verify on every run - idempotent, and it never overrides a stage somebody
 * chose. A renamed or custom status stays NULL for an administrator to decide.
 * Returns how many rows it classified.
 */
function changeStagesBackfill(PDO $conn): int
{
    $n = 0;
    $stmt = $conn->prepare("UPDATE change_statuses SET stage = ? WHERE stage IS NULL AND name = ?");
    foreach (CHANGE_STAGE_SEED_NAMES as $name => $stage) {
        $stmt->execute([$stage, $name]);
        $n += $stmt->rowCount();
    }
    return $n;
}
