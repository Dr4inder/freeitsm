# knowledgeAclIndex()

All access rows as [type][object_id]['principal:id' => true]. One query.

```php
function knowledgeAclIndex(PDO $conn): array
```

Defined in [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), line 803.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 809 | `knowledgeAclIndex` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |

## Called from

- [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) - in [knowledgeFolderIsReadable()](/code/functions/knowledgeFolderIsReadable.md)
- [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) - in [knowledgeAclSql()](/code/functions/knowledgeAclSql.md)

