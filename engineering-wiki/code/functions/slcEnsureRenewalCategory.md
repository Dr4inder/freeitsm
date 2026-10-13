# slcEnsureRenewalCategory()

Find or create the "Renewals" calendar category; returns its id (or null).

```php
function slcEnsureRenewalCategory(PDO $conn): ?int
```

Defined in [includes/software_licence_calendar.php](/code/files/includes/software_licence_calendar.php.md), line 128.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `slcEnsureRenewalCategory` | read [calendar_categories](/code/tables/calendar_categories.md) |  |
| 137 | `slcEnsureRenewalCategory` | **insert** [calendar_categories](/code/tables/calendar_categories.md) (`name`, `color`, `is_active`) |  |

## Called from

- [includes/software_licence_calendar.php](/code/files/includes/software_licence_calendar.php.md) - in [syncSoftwareLicenceCalendar()](/code/functions/syncSoftwareLicenceCalendar.md)

