# sla_mark_notification_sent()

```php
function sla_mark_notification_sent(
    PDO $conn,
    int $ticketId,
    string $targetType,
    string $trigger,
    array $recipients
): void
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 372.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$targetType` | `string` |  |  |
| `$trigger` | `string` |  |  |
| `$recipients` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 373 | `sla_mark_notification_sent` | **insert** [sla_notifications_sent](/code/tables/sla_notifications_sent.md) (`ticket_id`, `target_type`, `trigger_type`, `recipients`) |  |

## Called from

- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_run_breach_check()](/code/functions/sla_run_breach_check.md)

