# intuneGetAppSyncCandidates()

Pick the next `$limit` assets that are good candidates for an Intune app sync: - Have a linked intune_devices row (with a usable Graph id) - Have NO 'agent'-sourced rows in software_inventory_detail (agent wins) - Aren't already pending/running in another job Ordered: assets that have never been Intune-synced first, then oldest synced.

```php
function intuneGetAppSyncCandidates(PDO $conn, int $limit): array
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 603.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$limit` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 604 | `intuneGetAppSyncCandidates` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [assets](/code/tables/assets.md), read [intune_devices](/code/tables/intune_devices.md), read [intune_app_sync_job_assets](/code/tables/intune_app_sync_job_assets.md), read [intune_app_sync_jobs](/code/tables/intune_app_sync_jobs.md) |  |

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneCreateAppSyncJob()](/code/functions/intuneCreateAppSyncJob.md)

