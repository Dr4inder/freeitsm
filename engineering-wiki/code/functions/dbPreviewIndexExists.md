# dbPreviewIndexExists()

Does this index exist?

```php
function dbPreviewIndexExists(PDO $conn, string $dbName, string $table, string $index): bool
```

Defined in [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md), line 89.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$dbName` | `string` |  |  |
| `$table` | `string` |  |  |
| `$index` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md) - in [dbVerifyPreview()](/code/functions/dbVerifyPreview.md)

