# logMailboxActivity()

Log mailbox activity (imports and rejections)

```php
function logMailboxActivity($conn, $mailboxId, $entries)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1495.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailboxId` |  |  |  |
| `$entries` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1497 | `logMailboxActivity` | **insert** [mailbox_activity_log](/code/tables/mailbox_activity_log.md) (`mailbox_id`, `action`, `from_address`, `from_name`, `subject`, `reason`, `ticket_id`, `processing_log`, `created_datetime`) |  |

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

