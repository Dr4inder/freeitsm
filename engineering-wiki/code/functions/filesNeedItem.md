# filesNeedItem()

A file the caller holds `$need` on, or "not found".

```php
function filesNeedItem(PDO $conn, int $analystId, int $itemId, int $need, string $what = ''): array
```

Defined in [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md), line 92.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$itemId` | `int` |  |  |
| `$need` | `int` |  |  |
| `$what` | `string` | `''` |  |

**Returns:** `array`

## Calls

[filesApiFail()](/code/functions/filesApiFail.md), [filesItem()](/code/functions/filesItem.md), [filesNeed()](/code/functions/filesNeed.md)

## Called from

- [api/files/item.php](/code/files/api/files/item.php.md)
- [api/files/properties.php](/code/files/api/files/properties.php.md)
- [api/files/view.php](/code/files/api/files/view.php.md)

