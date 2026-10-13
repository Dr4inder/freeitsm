# directorySyncRun()

Run a sync.

```php
function directorySyncRun(
    PDO $conn,
    array $provider,
    string $mode = 'live',
    ?int $analystId = null
): array
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 481.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$mode` | `string` | `'live'` | 'live' \| 'preview' |
| `$analystId` | `?int` | `null` |  |

**Returns:** array the run row, including counts and status

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 487 | `directorySyncRun` | **insert** [directory_sync_runs](/code/tables/directory_sync_runs.md) (`provider_id`, `mode`, `status`, `started_datetime`, `triggered_by_analyst_id`) |  |
| 638 | `directorySyncRun` | **update** [auth_providers](/code/tables/auth_providers.md) (`sync_last_run_datetime`, `sync_last_count`) |  |

## Calls

[dsyncApplyToExisting()](/code/functions/dsyncApplyToExisting.md), [dsyncCreate()](/code/functions/dsyncCreate.md), [dsyncFetchPeople()](/code/functions/dsyncFetchPeople.md), [dsyncFindExisting()](/code/functions/dsyncFindExisting.md), [dsyncFinishRun()](/code/functions/dsyncFinishRun.md), [dsyncGetRun()](/code/functions/dsyncGetRun.md), [dsyncHandleMissing()](/code/functions/dsyncHandleMissing.md), [dsyncLogEntry()](/code/functions/dsyncLogEntry.md), [dsyncMapPerson()](/code/functions/dsyncMapPerson.md), [dsyncMissingScopeMessage()](/code/functions/dsyncMissingScopeMessage.md), [dsyncMissingScopes()](/code/functions/dsyncMissingScopes.md), [dsyncNewPersonSummary()](/code/functions/dsyncNewPersonSummary.md), [dsyncResolveManagers()](/code/functions/dsyncResolveManagers.md), [ldapBindService()](/code/functions/ldapBindService.md), [ldapOpen()](/code/functions/ldapOpen.md), [syncBrakeTripped()](/code/functions/syncBrakeTripped.md)

## Called from

- [api/system/run_directory_sync.php](/code/files/api/system/run_directory_sync.php.md)

