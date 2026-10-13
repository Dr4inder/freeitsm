# domainSyncCalendarKind()

One kind: adopt its category, clear its entries, and - if its surface says calendar - draw one all-day entry per domain with a date in `$column`. The column name is interpolated, never bound; it comes only from this file.

```php
function domainSyncCalendarKind(
    PDO $conn,
    string $source,
    string $surface,
    string $categoryName,
    string $colour,
    string $column,
    string $prefix,
    string $description,
    string $live
): int
```

Defined in [includes/domains/calendar.php](/code/files/includes/domains/calendar.php.md), line 69.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$surface` | `string` |  |  |
| `$categoryName` | `string` |  |  |
| `$colour` | `string` |  |  |
| `$column` | `string` |  |  |
| `$prefix` | `string` |  |  |
| `$description` | `string` |  |  |
| `$live` | `string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 73 | `domainSyncCalendarKind` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |
| 78 | `domainSyncCalendarKind` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 85 | `domainSyncCalendarKind` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `created_by`, `source`) |  |

## Calls

[awcAdoptExistingCategory()](/code/functions/awcAdoptExistingCategory.md), [awcEnsureCategory()](/code/functions/awcEnsureCategory.md)

## Called from

- [includes/domains/calendar.php](/code/files/includes/domains/calendar.php.md) - in [domainSyncExpiryCalendar()](/code/functions/domainSyncExpiryCalendar.md)

