# uploadDetectMimeFromBytes()

The real mime type of bytes held in memory, or null if this server cannot tell.

```php
function uploadDetectMimeFromBytes(string $bytes): ?string
```

Defined in [includes/uploads.php](/code/files/includes/uploads.php.md), line 865.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$bytes` | `string` |  |  |

**Returns:** `?string`

## Called from

- [includes/uploads.php](/code/files/includes/uploads.php.md) - in [uploadStoreBytes()](/code/functions/uploadStoreBytes.md)

