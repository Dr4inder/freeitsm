# checklistTicketForChecklist()

Returns the ticket a checklist belongs to, or 0 when it does not exist - so the caller can run the ticket access gate.

```php
function checklistTicketForChecklist(PDO $conn, int $checklistId): int
```

Defined in [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md), line 58.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$checklistId` | `int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 60 | `checklistTicketForChecklist` | read [ticket_checklists](/code/tables/ticket_checklists.md) |  |

## Called from

- [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md)

