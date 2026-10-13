# webchatParseOrigins()

Parse the stored allowed_origins blob into a clean list of origins. Accepts one per line (or comma-separated), trims trailing slashes, drops blanks/comments.

```php
function webchatParseOrigins(?string $raw): array
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 115.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `?string` |  |  |

**Returns:** `array`

## Called from

- [api/webchat/save_widget.php](/code/files/api/webchat/save_widget.php.md)
- [includes/webchat/public.php](/code/files/includes/webchat/public.php.md) - in [webchatPublicResolve()](/code/functions/webchatPublicResolve.md)

