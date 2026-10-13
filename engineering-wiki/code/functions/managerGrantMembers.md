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

Defined in [includes/managers.php](/code/files/includes/managers.php.md), line 172.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$g` | `array` |  |  |
| `$managerUserId` | `int` |  |  |
| `$base` | `string` |  |  |
| `$baseArgs` | `array` |  |  |

**Returns:** int[]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 181 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 183 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 188 | `managerGrantMembers` | read [users](/code/tables/users.md), read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 198 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |
| 209 | `managerGrantMembers` | read [users](/code/tables/users.md) |  |

## Called from

- [api/system/managers.php](/code/files/api/system/managers.php.md)
- [api/tickets/manager_access.php](/code/files/api/tickets/manager_access.php.md) - in [maState()](/code/functions/maState.md)
- [includes/managers.php](/code/files/includes/managers.php.md) - in [managerTeamUserIds()](/code/functions/managerTeamUserIds.md)

