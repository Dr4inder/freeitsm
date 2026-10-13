# buildFullEmailBody()

Build full email body with thread for sending to recipient Analyst's content + reply marker + quoted thread from DB

```php
function buildFullEmailBody($conn, $ticketId, $analystBody, $type)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 656.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$ticketId` |  |  |  |
| `$analystBody` |  |  |  |
| `$type` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 658 | `buildFullEmailBody` | read [tickets](/code/tables/tickets.md) |  |
| 664 | `buildFullEmailBody` | read [emails](/code/tables/emails.md) |  |

## Calls

[fmt_local()](/code/functions/fmt_local.md), [stripQuotedContent()](/code/functions/stripQuotedContent.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)

