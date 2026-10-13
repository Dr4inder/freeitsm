# filesShortcutTarget()

What a shortcut points at, IF the caller can see it - else null. The one place shortcuts meet permissions: a shortcut never widens access. Returns [name, folder_id (the target folder, or the file's folder), path, level].

```php
function filesShortcutTarget(PDO $conn, int $analystId, string $type, int $id): ?array
```

Defined in [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md), line 148.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$type` | `string` |  |  |
| `$id` | `int` |  |  |

**Returns:** `?array`

## Calls

[filesArticleTarget()](/code/functions/filesArticleTarget.md), [filesItem()](/code/functions/filesItem.md)

## Called from

- [api/files/list.php](/code/files/api/files/list.php.md)
- [api/files/shortcut.php](/code/files/api/files/shortcut.php.md)
- [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md) - in [filesNameTaken()](/code/functions/filesNameTaken.md)

