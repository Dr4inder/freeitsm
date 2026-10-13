# ssPortalSetting()

One setting, falling back to its default.

```php
function ssPortalSetting(PDO $conn, string $key): string
```

Defined in [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md), line 64.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |

**Returns:** `string`

## Calls

[ssPortalSettings()](/code/functions/ssPortalSettings.md)

## Called from

- [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) - in [ssPortalUpdatesEnabled()](/code/functions/ssPortalUpdatesEnabled.md)

