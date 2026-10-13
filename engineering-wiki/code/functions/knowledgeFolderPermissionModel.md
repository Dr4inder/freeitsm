# knowledgeFolderPermissionModel()

Which permission model this install runs. Default 'containers' — the safe end.

```php
function knowledgeFolderPermissionModel(PDO $conn): string
```

Defined in [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), line 758.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 763 | `knowledgeFolderPermissionModel` | read [system_settings](/code/tables/system_settings.md) |  |

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) - in [knowledgeFolderIsReadable()](/code/functions/knowledgeFolderIsReadable.md)
- [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md) - in [handleGet()](/code/functions/handleGet.md), [handlePreview()](/code/functions/handlePreview.md), [handleSet()](/code/functions/handleSet.md)
- [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) - in [knowledgeAclSql()](/code/functions/knowledgeAclSql.md)

