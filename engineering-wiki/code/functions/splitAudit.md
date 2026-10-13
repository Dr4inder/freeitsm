# splitAudit()

Writes one ticket_audit row for a split step, best-effort - a failed audit write never stops the split. An actor id of 0 is stored as NULL.

```php
function splitAudit(
    PDO $conn,
    int $ticketId,
    int $actorId,
    string $field,
    ?string $old,
    ?string $new
): void
```

Defined in [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), line 324.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$actorId` | `int` |  |  |
| `$field` | `string` |  |  |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Returns:** `void`

**Writes:** ticket_audit - the split shows in each ticket's history

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 327 | `splitAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Called from

- [includes/ticket_split.php](/code/files/includes/ticket_split.php.md) - in [splitTicket()](/code/functions/splitTicket.md), [undoSplit()](/code/functions/undoSplit.md)

