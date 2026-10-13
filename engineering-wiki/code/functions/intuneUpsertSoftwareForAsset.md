# intuneUpsertSoftwareForAsset()

Wipe and re-write the source='intune' software rows for a single asset. Apps catalogue (software_inventory_apps) is shared with the agent — we dedupe on (display_name, publisher).

```php
function intuneUpsertSoftwareForAsset(PDO $conn, int $assetId, array $apps): int
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 702.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$assetId` | `int` |  |  |
| `$apps` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 704 | `intuneUpsertSoftwareForAsset` | **delete** [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 711 | `intuneUpsertSoftwareForAsset` | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 715 | `intuneUpsertSoftwareForAsset` | **insert** [software_inventory_apps](/code/tables/software_inventory_apps.md) (`display_name`, `publisher`) |  |
| 718 | `intuneUpsertSoftwareForAsset` | **insert** [software_inventory_detail](/code/tables/software_inventory_detail.md) (`host_id`, `app_id`, `display_version`, `estimated_size`, `system_component`, `created_at`, `last_seen`, `source`) |  |

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneRunAppSyncJob()](/code/functions/intuneRunAppSyncJob.md)

