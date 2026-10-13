# failMailboxCheck()

Report a check that could not run at all: record it, say so, stop.

One function rather than a recording line beside each of the eight exits,
because the exit somebody forgets to update is exactly the silent one.

```php
function failMailboxCheck($conn, $mailboxId, string $error, array $extra = [])
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 553.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$mailboxId` |  |  |  |
| `$error` | `string` |  |  |
| `$extra` | `array` | `[]` |  |

## Calls

[recordMailboxCheckOutcome()](/code/functions/recordMailboxCheckOutcome.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

