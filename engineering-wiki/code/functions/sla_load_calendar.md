# sla_load_calendar()

Load a calendar with its hours + holidays nested. Returns null if not found.

```php
function sla_load_calendar(PDO $conn, int $calendar_id): ?array
```

Defined in [includes/sla.php](/code/files/includes/sla.php.md), line 346.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$calendar_id` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 347 | `sla_load_calendar` | read [sla_calendars](/code/tables/sla_calendars.md) |  |
| 352 | `sla_load_calendar` | read [sla_calendar_hours](/code/tables/sla_calendar_hours.md) |  |
| 356 | `sla_load_calendar` | read [sla_calendar_holidays](/code/tables/sla_calendar_holidays.md) |  |

## Called from

- [includes/sla.php](/code/files/includes/sla.php.md) - in [sla_get_state()](/code/functions/sla_get_state.md)
- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatIsOpenNow()](/code/functions/webchatIsOpenNow.md)

