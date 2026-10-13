# logEmailImport()

```php
function logEmailImport($conn, $mailboxId, $details)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1433.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailboxId` |  |  |  |
| `$details` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1436 | `logEmailImport` | **insert** [system_logs](/code/tables/system_logs.md) (`log_type`, `analyst_id`, `details`, `created_datetime`) |  |

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [saveEmailToDatabase()](/code/functions/saveEmailToDatabase.md)

