# dbVerifyPreview()

```php
function dbVerifyPreview(PDO $conn, array $schema, string $dbName): array
```

Defined in [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md), line 152.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$schema` | `array` |  |  |
| `$dbName` | `string` |  |  |

**Returns:** `array`

## Calls

[dbPreviewColumnExists()](/code/functions/dbPreviewColumnExists.md), [dbPreviewIndexExists()](/code/functions/dbPreviewIndexExists.md), [dbPreviewRepairs()](/code/functions/dbPreviewRepairs.md), [dbPreviewTableExists()](/code/functions/dbPreviewTableExists.md)

## Called from

- [api/system/db_verify_preview.php](/code/files/api/system/db_verify_preview.php.md)

