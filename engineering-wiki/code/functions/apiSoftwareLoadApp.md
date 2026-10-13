# apiSoftwareLoadApp()

```php
function apiSoftwareLoadApp(PDO $conn, int $appId): array
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 110.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$appId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 111 | `apiSoftwareLoadApp` | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md) - in [apiSoftwareAppsGet()](/code/functions/apiSoftwareAppsGet.md), [apiSoftwareAppMachinesList()](/code/functions/apiSoftwareAppMachinesList.md)

