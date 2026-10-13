# lmsAssignmentTargetProblem()

Is this target real? Returns a human-readable problem, or null if it is fine.

🔑 Checked on the way IN, on both create and edit. Without it a typo'd id is
accepted happily and the assignment reaches nobody at all — which looks
exactly like the feature not working, and is the worst kind of silence:
the row is there on the screen, and nothing ever happens because of it.

```php
function lmsAssignmentTargetProblem(PDO $conn, string $targetType, int $groupId): ?string
```

Defined in [includes/lms_access.php](/code/files/includes/lms_access.php.md), line 550.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$targetType` | `string` |  |  |
| `$groupId` | `int` |  |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 555 | `lmsAssignmentTargetProblem` | read [lms_learning_groups](/code/tables/lms_learning_groups.md) |  |
| 562 | `lmsAssignmentTargetProblem` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 568 | `lmsAssignmentTargetProblem` | read [analysts](/code/tables/analysts.md) |  |
| 574 | `lmsAssignmentTargetProblem` | read [users](/code/tables/users.md) |  |

## Calls

[lmsUserGroupsAvailable()](/code/functions/lmsUserGroupsAvailable.md)

## Called from

- [api/lms/assignment.php](/code/files/api/lms/assignment.php.md)
- [api/lms/assignments.php](/code/files/api/lms/assignments.php.md)

