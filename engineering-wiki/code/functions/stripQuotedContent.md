# stripQuotedContent()

Strip quoted/nested content from email body (for thread assembly) Relies on our own visible marker text, with generic blockquote fallback

```php
function stripQuotedContent($body)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 726.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$body` |  |  |  |

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md) - in [buildFullEmailBody()](/code/functions/buildFullEmailBody.md)

