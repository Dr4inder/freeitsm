# tenantSetting()

The value of a setting for one company.

```php
function tenantSetting(PDO $conn, ?int $tenantId, string $key, ?string $default = null): ?string
```

Defined in [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md), line 35.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  | null = ask the install-wide value only |
| `$key` | `string` |  |  |
| `$default` | `?string` | `null` |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 47 | `tenantSetting` | read [tenant_settings](/code/tables/tenant_settings.md) |  |
| 61 | `tenantSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## Calls

[isMultiTenant()](/code/functions/isMultiTenant.md), [tenancyTablesReady()](/code/functions/tenancyTablesReady.md)

## Called from

- [api/assets/save_asset_label_settings.php](/code/files/api/assets/save_asset_label_settings.php.md)
- [includes/asset_labels.php](/code/files/includes/asset_labels.php.md) - in [assetLabelSettings()](/code/functions/assetLabelSettings.md)
- [includes/services/asset_tags.php](/code/files/includes/services/asset_tags.php.md) - in `AssetTagsService::config`
- [includes/services/mandatory_fields.php](/code/files/includes/services/mandatory_fields.php.md) - in `MandatoryFieldsService::settings`
- [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md) - in [tenantSettingOn()](/code/functions/tenantSettingOn.md), [ticketChecklistClosureMode()](/code/functions/ticketChecklistClosureMode.md), [ticketChecklistEmptyClosureMode()](/code/functions/ticketChecklistEmptyClosureMode.md)

