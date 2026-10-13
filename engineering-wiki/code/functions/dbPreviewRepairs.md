# dbPreviewRepairs()

Row repairs db_verify.php would carry out, counted against this database.

⚠️ MAINTAINED BY HAND, exactly like DB_VERIFY_DESTRUCTIVE above: a repair
added to db_verify.php and not mirrored here makes this file quietly stop
answering the question it exists to answer. Each entry must count the SAME
rows its UPDATE would touch — copy the WHERE clause, do not paraphrase it.

COUNTS ONLY. Nothing here writes, and nothing here may.

```php
function dbPreviewRepairs(PDO $conn, string $dbName): array
```

Defined in [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md), line 119.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$dbName` | `string` |  |  |

**Returns:** array<int,array{key:string,table:string,rows:int,what:string}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `dbPreviewRepairs` | read [assets](/code/tables/assets.md), read [asset_history](/code/tables/asset_history.md) |  |

## Calls

[dbPreviewTableExists()](/code/functions/dbPreviewTableExists.md)

## Called from

- [includes/db_verify_preview.php](/code/files/includes/db_verify_preview.php.md) - in [dbVerifyPreview()](/code/functions/dbVerifyPreview.md)

