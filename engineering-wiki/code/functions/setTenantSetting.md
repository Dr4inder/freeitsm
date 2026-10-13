# setTenantSetting()

Set (or clear) one company's answer.

⚠️ A NULL value DELETES the row rather than storing an empty string, so the
company goes back to following the install-wide default. "Not set" and "set to
nothing" have to stay distinguishable, or a company can never be handed back to
the default once it has been given an answer.

```php
function setTenantSetting(PDO $conn, int $tenantId, string $key, ?string $value): void
```

Defined in [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md), line 109.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$value` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 113 | `setTenantSetting` | **delete** [tenant_settings](/code/tables/tenant_settings.md) |  |
| 118 | `setTenantSetting` | **insert** [tenant_settings](/code/tables/tenant_settings.md) (`tenant_id`, `setting_key`, `setting_value`) |  |

## Calls

[tenantSettingForget()](/code/functions/tenantSettingForget.md)

## Called from

- [api/assets/save_asset_label_settings.php](/code/files/api/assets/save_asset_label_settings.php.md)
- [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)
- [api/tickets/save_ticket_classification_settings.php](/code/files/api/tickets/save_ticket_classification_settings.php.md)
- [api/tickets/save_time_tracking_settings.php](/code/files/api/tickets/save_time_tracking_settings.php.md)

