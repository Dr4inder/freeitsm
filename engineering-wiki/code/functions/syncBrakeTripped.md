# syncBrakeTripped()

Has the directory returned so much less than last time that we should refuse to act on it?

THE MOST IMPORTANT FUNCTION IN THIS FILE. Without it, one wrong character in a
base DN deactivates every person in a company, and the sync reports success
while doing it. With it, the run stops and says why.

A first run (no baseline) is never braked — there is nothing to compare with,
and refusing to import anybody the first time would make the feature unusable.

```php
function syncBrakeTripped(array $provider, int $seen, ?array $words = null): ?string
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 434.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$provider` | `array` |  |  |
| `$seen` | `int` |  |  |
| `$words` | `?array` | `null` |  |

**Returns:** `?string`

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

