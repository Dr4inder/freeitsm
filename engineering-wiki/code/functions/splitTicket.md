# splitTicket()

Split messages off a ticket into a brand-new one.

```php
function splitTicket(
    PDO $conn,
    int $actorId,
    int $ticketId,
    int $fromEmailId,
    bool $includeNewer,
    ?string $newSubject = null,
    ?array $emailIds = null
): array
```

Defined in [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), line 149.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actorId` | `int` |  |  |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$fromEmailId` | `int` |  |  |
| `$includeNewer` | `bool` |  |  |
| `$newSubject` | `?string` | `null` |  |
| `$emailIds` | `?array` | `null` |  |

**Returns:** array {new_ticket_id, new_ticket_number, moved: int}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 194 | `splitTicket` | read [tickets](/code/tables/tickets.md) |  |
| 201 | `splitTicket` | **update** [emails](/code/tables/emails.md) (`ticket_id`) |  |
| 208 | `splitTicket` | **insert** [ticket_splits](/code/tables/ticket_splits.md) (`source_ticket_id`, `source_ticket_number`, `new_ticket_id`, `new_ticket_number`, `message_count`, `moved_email_ids`, `marker_email_id`, `split_by_id`, `split_datetime`) |  |
| 225 | `splitTicket` | **insert** [ticket_links](/code/tables/ticket_links.md) (`source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime`) |  |

## Calls

[splitAudit()](/code/functions/splitAudit.md), [splitCreateTicket()](/code/functions/splitCreateTicket.md), [splitLeaveMarker()](/code/functions/splitLeaveMarker.md), [splitMessagesByIds()](/code/functions/splitMessagesByIds.md), [splitMessagesFrom()](/code/functions/splitMessagesFrom.md), [splitMovableCount()](/code/functions/splitMovableCount.md), [ticketSensitivityApplyDefaults()](/code/functions/ticketSensitivityApplyDefaults.md), [ticketSensitivityInherit()](/code/functions/ticketSensitivityInherit.md)

## Called from

- [api/tickets/split_ticket.php](/code/files/api/tickets/split_ticket.php.md)

