# knowledgeAuditAdminOverride()

Record that the floor let somebody past an access list they were not on.

```php
function knowledgeAuditAdminOverride(PDO $conn, KnowledgeViewer $viewer, int $articleId): void
```

Defined in [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), line 461.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$viewer` | `KnowledgeViewer` |  |  |
| `$articleId` | `int` |  |  |

**Returns:** `void`

## Calls

[knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md)

## Called from

- [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) - in [knowledgeCanRead()](/code/functions/knowledgeCanRead.md)

