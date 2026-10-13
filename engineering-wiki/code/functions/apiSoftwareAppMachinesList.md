# apiSoftwareAppMachinesList()

GET /software/apps/{id}/machines — mirrors get_app_machines.php (+ asset_id)

```php
function apiSoftwareAppMachinesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 187.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 194 | `apiSoftwareAppMachinesList` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [assets](/code/tables/assets.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiRespond()](/code/functions/apiRespond.md), [apiSoftwareLoadApp()](/code/functions/apiSoftwareLoadApp.md)

*Nothing calls this function by name.*

