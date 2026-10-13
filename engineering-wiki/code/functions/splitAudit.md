# splitAudit()

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

Defined in [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), line 318.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$actorId` | `int` |  |  |
| `$field` | `string` |  |  |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 321 | `splitAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Called from

- [includes/ticket_split.php](/code/files/includes/ticket_split.php.md) - in [splitTicket()](/code/functions/splitTicket.md), [undoSplit()](/code/functions/undoSplit.md)

