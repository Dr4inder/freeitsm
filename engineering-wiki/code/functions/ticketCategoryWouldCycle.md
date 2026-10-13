# ticketCategoryWouldCycle()

Would making `$parentId` the parent of `$id` create a loop?

A cycle makes every path unresolvable and every roll-up infinite, and the
schema cannot express "not a descendant of itself", so it is checked here.

```php
function ticketCategoryWouldCycle(PDO $conn, int $id, ?int $parentId): bool
```

Defined in [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md), line 280.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$parentId` | `?int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 287 | `ticketCategoryWouldCycle` | read [ticket_categories](/code/tables/ticket_categories.md) |  |

## Called from

- [api/tickets/save_ticket_category.php](/code/files/api/tickets/save_ticket_category.php.md)

