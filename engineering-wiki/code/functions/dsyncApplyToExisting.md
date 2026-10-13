# dsyncApplyToExisting()

Brings an existing person in line with the directory - the fields it owns, leaver or returner status, and the sync bookkeeping - and returns the changes in plain words.

An address already held is never blanked. With `$preview` nothing is written.

```php
function dsyncApplyToExisting(
    PDO $conn,
    array $provider,
    array $existing,
    array $p,
    bool $preview
): string
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 702.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$existing` | `array` |  |  |
| `$p` | `array` |  |  |
| `$preview` | `bool` |  |  |

**Returns:** `string`

**Writes:** users(display_name, job_title, department, office, phone, mobile, employee_id, email, is_active, deactivated_datetime, last_seen_in_source, sync_missed_count, is_managed, auth_provider_id, directory_username)

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 755 | `dsyncApplyToExisting` | **update** [users](/code/tables/users.md) |  |

## Calls

[dsyncFieldLabel()](/code/functions/dsyncFieldLabel.md), [dsyncLinkIdentity()](/code/functions/dsyncLinkIdentity.md)

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

