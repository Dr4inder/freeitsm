# managerGrantMembers()

The people one line refers to, within the base (company, not-self, leavers). Used for both grants and exclusions.

```php
function managerGrantMembers(
    PDO $conn,
    array $g,
    int $managerUserId,
    string $base,
    array $baseArgs
): array
```

Defined in [includes/managers.php](/code/files/includes/managers.php.md), line 173.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$g` | `array` |  |  |
| `$managerUserId` | `int` |  |  |
| `$base` | `string` |  |  |
| `$baseArgs` | `array` |  |  |

**Returns:** int[]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 182 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 184 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 189 | `managerGrantMembers` | read [users](/code/tables/users.md), read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 199 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 210 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |

## Called from

- [api/system/managers.php](/code/files/api/system/managers.php.md)
- [api/tickets/manager_access.php](/code/files/api/tickets/manager_access.php.md) - in [maState()](/code/functions/maState.md)
- [includes/managers.php](/code/files/includes/managers.php.md) - in [managerTeamUserIds()](/code/functions/managerTeamUserIds.md)

