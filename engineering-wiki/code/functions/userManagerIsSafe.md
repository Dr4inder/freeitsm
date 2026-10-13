# userManagerIsSafe()

Would setting `$managerId` on `$userId` create a loop?

A manages B manages A is not a hypothetical: it happens whenever two people are
each other's cover, and any code that walks the chain to find an approver would
then walk it forever. Checked here because the database cannot express it.

Returns true if the assignment is SAFE.

```php
function userManagerIsSafe(PDO $conn, int $userId, ?int $managerId): bool
```

Defined in [includes/users.php](/code/files/includes/users.php.md), line 391.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$userId` | `int` |  |  |
| `$managerId` | `?int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 398 | `userManagerIsSafe` | read [users](/code/tables/users.md) |  |

## Called from

- [api/tickets/save_user.php](/code/files/api/tickets/save_user.php.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [dsyncResolveManagers()](/code/functions/dsyncResolveManagers.md)

