# apiSoftwareInstallCount()

Distinct non-system-component hosts for an app — the compliance install count.

```php
function apiSoftwareInstallCount(PDO $conn, int $appId): int
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 130.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$appId` | `int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 132 | `apiSoftwareInstallCount` | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |

## Called from

- [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md) - in [apiSoftwareAppsGet()](/code/functions/apiSoftwareAppsGet.md)

