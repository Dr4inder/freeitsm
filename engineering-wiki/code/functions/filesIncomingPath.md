# filesIncomingPath()

Where pieces of an in-progress upload collect.

```php
function filesIncomingPath(PDO $conn, string $token): string
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 89.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$token` | `string` |  |  |

**Returns:** `string`

## Calls

[filesStorageRoot()](/code/functions/filesStorageRoot.md)

## Called from

- [api/files/upload.php](/code/files/api/files/upload.php.md)

