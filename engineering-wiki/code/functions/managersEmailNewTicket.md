# managersEmailNewTicket()

The email version. Sent through the portal's own sender (the ticket mailbox, as account emails are), to the manager's address - none, nothing sent. The link is built on the configured public address, because a ticket that arrives by email is created from cron, where there is no request to take a host from.

English, like the portal's other system emails (includes/self_service_email.php).

```php
function managersEmailNewTicket(PDO $conn, int $managerId, array $t): bool
```

Defined in [includes/managers.php](/code/files/includes/managers.php.md), line 438.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$managerId` | `int` |  |  |
| `$t` | `array` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 440 | `managersEmailNewTicket` | read [users](/code/tables/users.md) |  |

## Calls

[publicAbsoluteUrl()](/code/functions/publicAbsoluteUrl.md), [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md)

## Called from

- [includes/managers.php](/code/files/includes/managers.php.md) - in [managersNotifyNewTicket()](/code/functions/managersNotifyNewTicket.md)

