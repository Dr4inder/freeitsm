# intuneSpawnAppWorker()

Spawn the CLI app-sync worker.

```php
function intuneSpawnAppWorker(int $jobId, ?string $phpExeOverride): bool
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 897.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$jobId` | `int` |  |  |
| `$phpExeOverride` | `?string` |  |  |

**Returns:** `bool`

## Calls

[intuneSpawnGenericWorker()](/code/functions/intuneSpawnGenericWorker.md)

## Called from

- [api/intune/create_app_sync_job.php](/code/files/api/intune/create_app_sync_job.php.md)

