# sla_get_first_active_mailbox()

```php
function sla_get_first_active_mailbox(PDO $conn): ?array
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 377.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 378 | `sla_get_first_active_mailbox` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |

## Calls

[decryptMailboxRow()](/code/functions/decryptMailboxRow.md)

*Nothing calls this function by name.*

