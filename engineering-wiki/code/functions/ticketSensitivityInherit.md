# ticketSensitivityInherit()

A ticket made from, or combined with, others is confidential if any of them was. Used by split (one source) and merge (several).

```php
function ticketSensitivityInherit(PDO $conn, int $ticketId, array $sourceIds, string $reason): bool
```

Defined in [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md), line 135.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$sourceIds` | `array` |  |  |
| `$reason` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 142 | `ticketSensitivityInherit` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[ticketSensitivityRaise()](/code/functions/ticketSensitivityRaise.md), [ticketSensitivityReady()](/code/functions/ticketSensitivityReady.md)

## Called from

- [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md) - in [mergeTickets()](/code/functions/mergeTickets.md)
- [includes/ticket_split.php](/code/files/includes/ticket_split.php.md) - in [splitTicket()](/code/functions/splitTicket.md)

