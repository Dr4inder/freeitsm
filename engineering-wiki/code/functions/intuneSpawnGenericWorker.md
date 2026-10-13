# intuneSpawnGenericWorker()

Generic spawn helper used by both the device sync and the app sync workers.

```php
function intuneSpawnGenericWorker(
    string $workerScriptName,
    int $jobId,
    ?string $phpExeOverride
): bool
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 559.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$workerScriptName` | `string` |  |  |
| `$jobId` | `int` |  |  |
| `$phpExeOverride` | `?string` |  |  |

**Returns:** `bool`

## Calls

[intuneFindPhpExe()](/code/functions/intuneFindPhpExe.md)

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneSpawnWorker()](/code/functions/intuneSpawnWorker.md), [intuneSpawnAppWorker()](/code/functions/intuneSpawnAppWorker.md)

