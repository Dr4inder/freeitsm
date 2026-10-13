# tableViewDelete()

Delete a view. Owner only.

```php
function tableViewDelete(PDO $conn, int $analystId, int $viewId): void
```

Defined in [includes/table_views.php](/code/files/includes/table_views.php.md), line 208.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$viewId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 210 | `tableViewDelete` | **delete** [table_views](/code/tables/table_views.md) |  |

## Called from

- [api/table-views/delete.php](/code/files/api/table-views/delete.php.md)

