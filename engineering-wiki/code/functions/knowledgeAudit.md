# knowledgeAudit()

Thin alias onto includes/knowledge/audit.php, the one writer.

```php
function knowledgeAudit(
    PDO $conn,
    string $type,
    int $id,
    string $action,
    int $analystId,
    ?array $detail
): void
```

Defined in [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), line 443.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$type` | `string` |  |  |
| `$id` | `int` |  |  |
| `$action` | `string` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$detail` | `?array` |  |  |

**Returns:** `void`

## Calls

[knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md)

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) - in [handleCreate()](/code/functions/handleCreate.md), [handleRename()](/code/functions/handleRename.md), [handleMove()](/code/functions/handleMove.md), [handleDelete()](/code/functions/handleDelete.md), [handleMoveArticle()](/code/functions/handleMoveArticle.md), [handleAddShortcut()](/code/functions/handleAddShortcut.md), [handleRemoveShortcut()](/code/functions/handleRemoveShortcut.md)

