# tenantSettingOn()

Convenience for a yes/no setting. Anything but '0' is on.

```php
function tenantSettingOn(PDO $conn, ?int $tenantId, string $key, bool $default = true): bool
```

Defined in [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md), line 95.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$key` | `string` |  |  |
| `$default` | `bool` | `true` |  |

**Returns:** `bool`

## Calls

[tenantSetting()](/code/functions/tenantSetting.md)

## Called from

- [api/tickets/get_ticket_classification.php](/code/files/api/tickets/get_ticket_classification.php.md)
- [api/tickets/get_time_tracking_settings.php](/code/files/api/tickets/get_time_tracking_settings.php.md)
- [includes/services/mandatory_fields.php](/code/files/includes/services/mandatory_fields.php.md) - in `MandatoryFieldsService::settings`
- [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md) - in [timeTrackingUiOn()](/code/functions/timeTrackingUiOn.md), [timeTrackingApiOn()](/code/functions/timeTrackingApiOn.md), [ticketCategoryOn()](/code/functions/ticketCategoryOn.md), [ticketClosureCategoryOn()](/code/functions/ticketClosureCategoryOn.md), [ticketResolutionCodeOn()](/code/functions/ticketResolutionCodeOn.md)

