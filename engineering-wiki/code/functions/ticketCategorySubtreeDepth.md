# ticketCategorySubtreeDepth()

How many levels the subtree rooted at `$id` occupies (1 = no children).

Only needed when RE-PARENTING: the category itself may fit under its new
parent while its own children fall off the end of the depth cap.

```php
function ticketCategorySubtreeDepth(PDO $conn, int $id, int $guard = 0): int
```

Defined in [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md), line 256.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$guard` | `int` | `0` |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 260 | `ticketCategorySubtreeDepth` | read [ticket_categories](/code/tables/ticket_categories.md) |  |

## Called from

- [api/tickets/save_ticket_category.php](/code/files/api/tickets/save_ticket_category.php.md)
- [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md) - in [ticketCategorySubtreeDepth()](/code/functions/ticketCategorySubtreeDepth.md)

