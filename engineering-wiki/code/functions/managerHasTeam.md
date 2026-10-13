# managerHasTeam()

Does this portal user manage anybody? Decides whether "Team tickets" is shown.

```php
function managerHasTeam(PDO $conn, int $userId): bool
```

Defined in [includes/managers.php](/code/files/includes/managers.php.md), line 258.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$userId` | `int` |  |  |

**Returns:** `bool`

## Calls

[managerTeamUserIds()](/code/functions/managerTeamUserIds.md)

## Called from

- [self-service/includes/header.php](/code/files/self-service/includes/header.php.md)

