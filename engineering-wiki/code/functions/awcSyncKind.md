# awcSyncKind()

Clear and rebuild one kind of auto-generated asset date entry.

`$ready` is the caller's answer to "does the column exist yet" - passed in
rather than checked here so the two kinds cannot accidentally gate each
other, which is how a missing lease column would otherwise have taken the
warranty entries down with it.

Clearing happens even when the kind is switched OFF, and even when the
column is missing: that is what makes turning it off actually remove the
entries instead of leaving the last set behind for ever.

```php
function awcSyncKind(
    PDO $conn,
    string $source,
    string $surface,
    string $column,
    string $categoryName,
    string $categoryColour,
    string $titlePrefix,
    string $description,
    bool $ready
): int
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 107.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$surface` | `string` |  |  |
| `$column` | `string` |  |  |
| `$categoryName` | `string` |  |  |
| `$categoryColour` | `string` |  |  |
| `$titlePrefix` | `string` |  |  |
| `$description` | `string` |  |  |
| `$ready` | `bool` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 123 | `awcSyncKind` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |
| 142 | `awcSyncKind` | read [assets](/code/tables/assets.md) |  |
| 152 | `awcSyncKind` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `created_by`, `source`) |  |

## Calls

[awcAdoptExistingCategory()](/code/functions/awcAdoptExistingCategory.md), [awcEnsureCategory()](/code/functions/awcEnsureCategory.md), [leaseGoneBackSql()](/code/functions/leaseGoneBackSql.md), [leaseReady()](/code/functions/leaseReady.md)

## Called from

- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [syncAssetWarrantyCalendar()](/code/functions/syncAssetWarrantyCalendar.md)

