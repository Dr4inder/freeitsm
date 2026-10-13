# maReady()

Are the tables there? Before DB Verify there is nothing to show or change.

```php
function maReady(PDO $conn): bool
```

Defined in [api/tickets/manager_access.php](/code/files/api/tickets/manager_access.php.md), line 60.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 62 | `maReady` | read [manager_grants](/code/tables/manager_grants.md) |  |

## Called from

- [api/tickets/manager_access.php](/code/files/api/tickets/manager_access.php.md) - in [maState()](/code/functions/maState.md)

