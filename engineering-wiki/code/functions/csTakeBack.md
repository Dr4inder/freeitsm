# csTakeBack()

🔴 TAKE BACK EVERYTHING ONE CONNECTION WROTE, then reset its analysts.

Called while the connection is still as it was, because only the old settings
can reach the old events: a provider switch, a CalDAV server moving, or the
connection being deleted all leave them somewhere the new state cannot reach.
Only this connection's analysts are touched; everybody on another connection
carries on. Nobody's feed link is affected.

```php
function csTakeBack(PDO $conn, array $existing): void
```

Defined in [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md), line 69.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$existing` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 74 | `csTakeBack` | read [calendar_sync_events](/code/tables/calendar_sync_events.md) |  |
| 84 | `csTakeBack` | read [calendar_enrolments](/code/tables/calendar_enrolments.md) |  |
| 93 | `csTakeBack` | **update** [calendar_enrolments](/code/tables/calendar_enrolments.md) (`mode`, `calendar_address`, `credentials`, `connection_id`, `delta_token`, `delta_synced_datetime`, `subscription_id`, `subscription_expires`, `subscription_secret`, `last_error`, `updated_datetime`) |  |

## Calls

[calendarSyncLoadConnection()](/code/functions/calendarSyncLoadConnection.md), [calendarSyncProviderFor()](/code/functions/calendarSyncProviderFor.md), [calendarSyncRemoveRow()](/code/functions/calendarSyncRemoveRow.md)

## Called from

- [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md)

