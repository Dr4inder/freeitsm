# handleRemove()

```php
function handleRemove(PDO $conn, int $analystId, array $in): void
```

Defined in [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), line 286.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 292 | `handleRemove` | **delete** [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 302 | `handleRemove` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |

## Calls

[knowledgeAclResetCaches()](/code/functions/knowledgeAclResetCaches.md), [permAudit()](/code/functions/permAudit.md), [requireObject()](/code/functions/requireObject.md)

## Called from

- [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md)

