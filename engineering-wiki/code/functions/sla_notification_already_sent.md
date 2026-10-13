# sla_notification_already_sent()

Check if we've already fired this notification for (ticket, target, trigger).

```php
function sla_notification_already_sent(
    PDO $conn,
    int $ticketId,
    string $targetType,
    string $trigger
): bool
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 366.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$targetType` | `string` |  |  |
| `$trigger` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 367 | `sla_notification_already_sent` | read [sla_notifications_sent](/code/tables/sla_notifications_sent.md) |  |

## Called from

- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_run_breach_check()](/code/functions/sla_run_breach_check.md)

