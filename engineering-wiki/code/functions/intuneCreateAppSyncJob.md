# intuneCreateAppSyncJob()

Create a new app-sync job for the next batch of candidate assets. Returns ['job_id' => int, 'asset_count' => int, 'reused' => bool]. If a pending/running job already exists, returns it (reused=true).

```php
function intuneCreateAppSyncJob(PDO $conn): array
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 636.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 639 | `intuneCreateAppSyncJob` | read [intune_app_sync_jobs](/code/tables/intune_app_sync_jobs.md) |  |
| 642 | `intuneCreateAppSyncJob` | read [intune_app_sync_job_assets](/code/tables/intune_app_sync_job_assets.md) |  |
| 649 | `intuneCreateAppSyncJob` | **update** [intune_app_sync_jobs](/code/tables/intune_app_sync_jobs.md) (`status`, `message`, `finished_datetime`) |  |
| 667 | `intuneCreateAppSyncJob` | **insert** [intune_app_sync_jobs](/code/tables/intune_app_sync_jobs.md) (`started_datetime`, `status`, `total`, `processed`, `failed`, `message`) |  |
| 673 | `intuneCreateAppSyncJob` | **insert** [intune_app_sync_job_assets](/code/tables/intune_app_sync_job_assets.md) (`job_id`, `asset_id`, `status`) |  |

## Calls

[intuneGetAppBatchSize()](/code/functions/intuneGetAppBatchSize.md), [intuneGetAppSyncCandidates()](/code/functions/intuneGetAppSyncCandidates.md)

## Called from

- [api/intune/create_app_sync_job.php](/code/files/api/intune/create_app_sync_job.php.md)

