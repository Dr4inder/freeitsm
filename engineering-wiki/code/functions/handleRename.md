# handleRename()

Renames a knowledge folder the caller can read, and audits the change.

```php
function handleRename(PDO $conn, int $analystId, array $in): void
```

Defined in [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), line 193.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 200 | `handleRename` | **update** [knowledge_folders](/code/tables/knowledge_folders.md) (`name`, `modified_datetime`) |  |

## Calls

[knowledgeAudit()](/code/functions/knowledgeAudit.md), [requireFolderAccess()](/code/functions/requireFolderAccess.md)

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md)

