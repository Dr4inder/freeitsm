# knowledgeFolderIsReadable()

May this viewer reach this folder? Delegates; never re-implements the rule.

```php
function knowledgeFolderIsReadable(PDO $conn, KnowledgeViewer $viewer, int $folderId): bool
```

Defined in [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), line 136.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$viewer` | `KnowledgeViewer` |  |  |
| `$folderId` | `int` |  |  |

**Returns:** `bool`

## Calls

[knowledgeAclHasAnyRows()](/code/functions/knowledgeAclHasAnyRows.md), [knowledgeAclIndex()](/code/functions/knowledgeAclIndex.md), [knowledgeFolderIndex()](/code/functions/knowledgeFolderIndex.md), [knowledgeFolderPermissionModel()](/code/functions/knowledgeFolderPermissionModel.md), [knowledgeFolderReadable()](/code/functions/knowledgeFolderReadable.md), [knowledgeViewerHasAdminFloor()](/code/functions/knowledgeViewerHasAdminFloor.md), [knowledgeViewerPrincipals()](/code/functions/knowledgeViewerPrincipals.md)

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) - in [handleList()](/code/functions/handleList.md), [requireFolderAccess()](/code/functions/requireFolderAccess.md)

