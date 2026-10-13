# dsyncFinishRun()

Close a run off.

```php
function dsyncFinishRun(PDO $conn, int $runId, string $status, array $c, string $message): void
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 928.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$runId` | `int` |  |  |
| `$status` | `string` |  |  |
| `$c` | `array` |  |  |
| `$message` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 931 | `dsyncFinishRun` | **update** [directory_sync_runs](/code/tables/directory_sync_runs.md) (`status`, `finished_datetime`, `seen_count`, `created_count`, `updated_count`, `adopted_count`, `deactivated_count`, `conflict_count`, `error_count`, `message`) |  |

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

