# checklistTicketForItem()

```php
function checklistTicketForItem(PDO $conn, int $itemId): int
```

Defined in [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md), line 44.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$itemId` | `int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 46 | `checklistTicketForItem` | read [ticket_checklist_items](/code/tables/ticket_checklist_items.md), read [ticket_checklists](/code/tables/ticket_checklists.md) |  |

## Called from

- [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md)

