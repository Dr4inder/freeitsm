# mimeMultipart()

Wrap [headers, content] entities in a multipart/<subtype> entity.

```php
function mimeMultipart(string $subtype, array $entities, string $extraParams = ''): array
```

Defined in [includes/mime_message.php](/code/files/includes/mime_message.php.md), line 144.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$subtype` | `string` |  |  |
| `$entities` | `array` |  |  |
| `$extraParams` | `string` | `''` |  |

**Returns:** `array`

## Called from

- [includes/mime_message.php](/code/files/includes/mime_message.php.md) - in [mimeBuildMessage()](/code/functions/mimeBuildMessage.md)

