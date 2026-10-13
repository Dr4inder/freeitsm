# awcEnsureCategory()

Which calendar category should this kind of entry use?

🔴 REMEMBERED BY ID, NEVER BY NAME. Looking it up by name meant that
renaming the category - the first thing anybody does, and the ONLY way to
get the word in their own language, since these rows are stored data
rather than interface text - caused the next sync to miss it, create a
second category under the original name, and split the entries across the
two with nothing on screen to explain it.

Four steps, most specific first:
  1. the id recorded last time, if that category still exists;
  2. otherwise whatever category the EXISTING entries of this kind are
     already in - which adopts a category that was renamed before this
     code existed, with no migration to run and nothing for anybody to do;
  3. otherwise one matching the default name, for a fresh install whose
     categories were seeded;
  4. otherwise create it.

Colour is only ever set at creation. Changing it afterwards is somebody
expressing a preference, and a sync that reset it every night would be
quietly overruling them.

```php
function awcEnsureCategory(PDO $conn, string $source, string $name, string $colour): ?int
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 183.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$name` | `string` |  |  |
| `$colour` | `string` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 190 | `awcEnsureCategory` | read [calendar_categories](/code/tables/calendar_categories.md) |  |
| 200 | `awcEnsureCategory` | read [calendar_categories](/code/tables/calendar_categories.md) |  |
| 210 | `awcEnsureCategory` | **insert** [calendar_categories](/code/tables/calendar_categories.md) (`name`, `color`, `is_active`) |  |

## Calls

[awcGetSetting()](/code/functions/awcGetSetting.md), [awcSetSetting()](/code/functions/awcSetSetting.md)

## Called from

- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [awcSyncKind()](/code/functions/awcSyncKind.md)
- [includes/domains/calendar.php](/code/files/includes/domains/calendar.php.md) - in [domainSyncCalendarKind()](/code/functions/domainSyncCalendarKind.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)
- [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md) - in [projectSyncCalendarKind()](/code/functions/projectSyncCalendarKind.md)

