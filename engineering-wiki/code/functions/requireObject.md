# requireObject()

'folder' or 'article', and an id that exists. Anything else is refused.

```php
function requireObject(PDO $conn, array $src): array
```

Defined in [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), line 80.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$src` | `array` |  |  |

**Returns:** `array`

## Called from

- [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md) - in [handleGet()](/code/functions/handleGet.md), [handleSetMode()](/code/functions/handleSetMode.md), [handleAdd()](/code/functions/handleAdd.md), [handleRemove()](/code/functions/handleRemove.md)

