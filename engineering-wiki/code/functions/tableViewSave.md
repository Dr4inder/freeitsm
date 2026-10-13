# tableViewSave()

Create or update a view. Returns its id.

⚠️ Only the OWNER may change one. A view shared with a team is readable by
that team and writable by nobody else — Ed's choice, and the one that makes
"who changed my view?" a question that never gets asked.

```php
function tableViewSave(PDO $conn, int $analystId, array $in): int
```

Defined in [includes/table_views.php](/code/files/includes/table_views.php.md), line 137.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 180 | `tableViewSave` | read [table_views](/code/tables/table_views.md) |  |
| 187 | `tableViewSave` | **update** [table_views](/code/tables/table_views.md) (`name`, `description`, `visibility`, `team_id`, `config`, `updated_datetime`) |  |
| 196 | `tableViewSave` | **insert** [table_views](/code/tables/table_views.md) (`table_key`, `name`, `description`, `owner_id`, `visibility`, `team_id`, `config`, `created_datetime`, `updated_datetime`) |  |

## Calls

[tableViewTeamIds()](/code/functions/tableViewTeamIds.md)

## Called from

- [api/table-views/save.php](/code/files/api/table-views/save.php.md)

