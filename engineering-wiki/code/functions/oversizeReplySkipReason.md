# oversizeReplySkipReason()

Why NOT to auto-reply to this sender, or null to go ahead.

```php
function oversizeReplySkipReason(
    PDO $conn,
    int $mailboxId,
    string $from,
    string $mailboxAddress
): ?string
```

Defined in [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md), line 290.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$mailboxId` | `int` |  |  |
| `$from` | `string` |  |  |
| `$mailboxAddress` | `string` |  |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 300 | `oversizeReplySkipReason` | read [mailbox_activity_log](/code/tables/mailbox_activity_log.md) |  |

## Called from

- [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) - in [oversizeNotify()](/code/functions/oversizeNotify.md)

