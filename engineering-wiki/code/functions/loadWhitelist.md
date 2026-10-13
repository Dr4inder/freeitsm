# loadWhitelist()

Load whitelist entries for a mailbox

```php
function loadWhitelist($conn, $mailboxId)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1449.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailboxId` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1450 | `loadWhitelist` | read [mailbox_email_whitelist](/code/tables/mailbox_email_whitelist.md) |  |

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

