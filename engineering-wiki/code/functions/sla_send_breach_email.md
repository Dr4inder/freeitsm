# sla_send_breach_email()

Send a breach / warning email via the ticket's originating mailbox. Falls back to the first active mailbox if the ticket has none (e.g. manually-created ticket).

```php
function sla_send_breach_email(
    PDO $conn,
    int $ticketId,
    array $state,
    string $targetType,
    string $trigger,
    array $recipients
): void
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 286.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$state` | `array` |  |  |
| `$targetType` | `string` |  |  |
| `$trigger` | `string` |  |  |
| `$recipients` | `array` |  |  |

**Returns:** `void`

## Calls

[buildTicketMergeData()](/code/functions/buildTicketMergeData.md), [internalTicketEmail()](/code/functions/internalTicketEmail.md), [sla_build_breach_email_body()](/code/functions/sla_build_breach_email_body.md)

## Called from

- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_run_breach_check()](/code/functions/sla_run_breach_check.md)

