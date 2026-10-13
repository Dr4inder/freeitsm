# dsyncHandleMissing()

People this provider manages who were NOT in this run's results.

They are not deactivated on the spot — sync_missed_count is incremented, and
only somebody who has been missing for the provider's threshold number of runs
is marked as left. Rule 3 at the top of this file.

```php
function dsyncHandleMissing(
    PDO $conn,
    array $provider,
    array $seenUserIds,
    int $runId,
    bool $preview
): int
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 828.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$seenUserIds` | `array` |  |  |
| `$runId` | `int` |  |  |
| `$preview` | `bool` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 833 | `dsyncHandleMissing` | read [users](/code/tables/users.md) |  |
| 856 | `dsyncHandleMissing` | **update** [users](/code/tables/users.md) (`is_active`, `deactivated_datetime`, `sync_missed_count`) |  |
| 865 | `dsyncHandleMissing` | **update** [users](/code/tables/users.md) (`sync_missed_count`) |  |

## Calls

[dsyncLogEntry()](/code/functions/dsyncLogEntry.md)

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

