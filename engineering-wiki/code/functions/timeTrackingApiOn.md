# timeTrackingApiOn()

Should the REST API serve time entries for a ticket belonging to this company?

```php
function timeTrackingApiOn(PDO $conn, ?int $tenantId): bool
```

Defined in [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md), line 160.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Returns:** `bool`

## Calls

[tenantSettingOn()](/code/functions/tenantSettingOn.md)

## Called from

- [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md) - in [apiRequireTimeTracking()](/code/functions/apiRequireTimeTracking.md)

