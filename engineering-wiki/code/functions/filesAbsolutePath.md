# filesAbsolutePath()

The absolute path of a stored version, or null if the row's path is not one we could have written. A row reading "../../config.php" must never be served.

```php
function filesAbsolutePath(PDO $conn, string $rel): ?string
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 78.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$rel` | `string` |  |  |

**Returns:** `?string`

## Calls

[filesStorageRoot()](/code/functions/filesStorageRoot.md)

## Called from

- [api/files/download.php](/code/files/api/files/download.php.md)
- [api/files/view.php](/code/files/api/files/view.php.md)

