# apiSoftwareLoadApp()

Loads one discovered application row, or answers 404 and stops.

```php
function apiSoftwareLoadApp(PDO $conn, int $appId): array
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 119.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$appId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 120 | `apiSoftwareLoadApp` | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md) - in [apiSoftwareAppsGet()](/code/functions/apiSoftwareAppsGet.md), [apiSoftwareAppMachinesList()](/code/functions/apiSoftwareAppMachinesList.md)

