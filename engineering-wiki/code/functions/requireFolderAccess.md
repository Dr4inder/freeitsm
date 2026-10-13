# requireFolderAccess()

Refuse anything the caller may not reach, in the same words as "not found".

```php
function requireFolderAccess(PDO $conn, int $analystId, ?int $folderId): void
```

Defined in [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), line 151.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$folderId` | `?int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 155 | `requireFolderAccess` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |

## Calls

[knowledgeFolderIsReadable()](/code/functions/knowledgeFolderIsReadable.md)

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) - in [handleCreate()](/code/functions/handleCreate.md), [handleRename()](/code/functions/handleRename.md), [handleMove()](/code/functions/handleMove.md), [handleDelete()](/code/functions/handleDelete.md), [handleMoveArticle()](/code/functions/handleMoveArticle.md), [handleAddShortcut()](/code/functions/handleAddShortcut.md), [handleRemoveShortcut()](/code/functions/handleRemoveShortcut.md)

