# intuneRunAppSyncJob()

Run an app-sync job: iterate its child rows, fetch detectedApps from Graph for each asset, upsert into software_inventory_*, and tick progress. Designed for CLI worker use.

```php
function intuneRunAppSyncJob(PDO $conn, int $jobId): void
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 762.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$jobId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 774 | `intuneRunAppSyncJob` | **update** [intune_app_sync_jobs](/code/tables/intune_app_sync_jobs.md) (`status`, `processed`, `failed`, `finished_datetime`, `message`) |  |
| 780 | `intuneRunAppSyncJob` | **update** [intune_app_sync_job_assets](/code/tables/intune_app_sync_job_assets.md) (`status`, `error_message`, `synced_datetime`, `app_count`) |  |
| 800 | `intuneRunAppSyncJob` | read [intune_app_sync_job_assets](/code/tables/intune_app_sync_job_assets.md), read [assets](/code/tables/assets.md), read [intune_devices](/code/tables/intune_devices.md) |  |

## Calls

[intuneFetchDeviceApps()](/code/functions/intuneFetchDeviceApps.md), [intuneGetSettings()](/code/functions/intuneGetSettings.md), [intuneUpsertSoftwareForAsset()](/code/functions/intuneUpsertSoftwareForAsset.md)

*Nothing calls this function by name.*

