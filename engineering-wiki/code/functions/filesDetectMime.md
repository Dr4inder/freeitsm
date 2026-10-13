# filesDetectMime()

The mime type we record for a stored file: sniffed, else guessed from the name.

```php
function filesDetectMime(string $absPath, string $name): string
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 106.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$absPath` | `string` |  |  |
| `$name` | `string` |  |  |

**Returns:** `string`

## Calls

[attachmentServeRules()](/code/functions/attachmentServeRules.md), [uploadDetectMime()](/code/functions/uploadDetectMime.md)

## Called from

- [api/files/upload.php](/code/files/api/files/upload.php.md)

