# projectNudgeDeciders()

Everybody who may decide a change request on this project - the setting's rule, applied to each active analyst.

```php
function projectNudgeDeciders(PDO $conn, array $project, ?int $raisedBy): array
```

Defined in [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md), line 182.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$project` | `array` |  |  |
| `$raisedBy` | `?int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 185 | `projectNudgeDeciders` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectCanDecideChange()](/code/functions/projectCanDecideChange.md)

## Called from

- [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) - in [projectAlertsStalled()](/code/functions/projectAlertsStalled.md)

