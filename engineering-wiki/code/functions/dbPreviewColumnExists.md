# dbPreviewColumnExists()

Does this column exist?

```php
function dbPreviewColumnExists(PDO $conn, string $dbName, string $table, string $column): bool
```

Defined in [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md), line 81.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$dbName` | `string` |  |  |
| `$table` | `string` |  |  |
| `$column` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md) - in [dbVerifyPreview()](/code/functions/dbVerifyPreview.md)

