# projectSyncCalendarKind()

One kind: adopt its category, clear its entries, and - when on - draw one all-day entry per row.

```php
function projectSyncCalendarKind(
    PDO $conn,
    string $source,
    bool $on,
    string $sql,
    callable $title,
    callable $description
): int
```

Defined in [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md), line 97.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$on` | `bool` |  |  |
| `$sql` | `string` |  |  |
| `$title` | `callable` |  |  |
| `$description` | `callable` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 100 | `projectSyncCalendarKind` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |
| 105 | `projectSyncCalendarKind` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `created_by`, `source`) |  |

## Calls

[awcAdoptExistingCategory()](/code/functions/awcAdoptExistingCategory.md), [awcEnsureCategory()](/code/functions/awcEnsureCategory.md)

## Called from

- [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md) - in [projectSyncCalendar()](/code/functions/projectSyncCalendar.md)

