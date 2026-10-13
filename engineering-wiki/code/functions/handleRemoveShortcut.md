# handleRemoveShortcut()

Remove a shortcut. The article itself is untouched — that is the whole point.

```php
function handleRemoveShortcut(PDO $conn, int $analystId, array $in): void
```

Defined in [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), line 371.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 378 | `handleRemoveShortcut` | **delete** [knowledge_shortcuts](/code/tables/knowledge_shortcuts.md) |  |

## Calls

[knowledgeAudit()](/code/functions/knowledgeAudit.md), [requireFolderAccess()](/code/functions/requireFolderAccess.md)

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md)

