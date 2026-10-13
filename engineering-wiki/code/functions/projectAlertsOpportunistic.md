# projectAlertsOpportunistic()

For installs with no cron: opening the portfolio runs the scan, at most every 15 minutes. Never throws; the portfolio must load whatever happens here.

```php
function projectAlertsOpportunistic(PDO $conn): void
```

Defined in [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), line 274.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 277 | `projectAlertsOpportunistic` | read [system_settings](/code/tables/system_settings.md) |  |
| 281 | `projectAlertsOpportunistic` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Calls

[projectAlertsRun()](/code/functions/projectAlertsRun.md)

## Called from

- [api/projects/list.php](/code/files/api/projects/list.php.md)

