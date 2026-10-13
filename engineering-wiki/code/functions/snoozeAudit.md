# snoozeAudit()

Best-effort trail entry. Never fails the action it is recording.

```php
function snoozeAudit(PDO $conn, int $ticketId, int $analystId, ?string $old, ?string $new): void
```

Defined in [includes/ticket_snooze.php](/code/files/includes/ticket_snooze.php.md), line 304.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 307 | `snoozeAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Called from

- [includes/ticket_snooze.php](/code/files/includes/ticket_snooze.php.md) - in [snoozeTicket()](/code/functions/snoozeTicket.md), [wakeTicket()](/code/functions/wakeTicket.md)

