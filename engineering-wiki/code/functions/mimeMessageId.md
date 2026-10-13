# mimeMessageId()

A globally unique Message-ID on the sender's own domain, e.g. <3f9c...e1.1790805999@example.com>. Falls back to a fixed domain if the From address has none we can use.

```php
function mimeMessageId(string $from): string
```

Defined in [includes/mime_message.php](/code/files/includes/mime_message.php.md), line 38.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$from` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/mime_message.php](/code/files/includes/mime_message.php.md) - in [mimeBuildMessage()](/code/functions/mimeBuildMessage.md)

