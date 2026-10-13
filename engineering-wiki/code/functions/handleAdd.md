# handleAdd()

```php
function handleAdd(PDO $conn, int $analystId, array $in): void
```

Defined in [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), line 262.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 273 | `handleAdd` | **insert** [knowledge_acl](/code/tables/knowledge_acl.md) (`object_type`, `object_id`, `principal_type`, `principal_id`, `created_by_id`, `created_datetime`) |  |

## Calls

[knowledgeAclResetCaches()](/code/functions/knowledgeAclResetCaches.md), [permAudit()](/code/functions/permAudit.md), [requireObject()](/code/functions/requireObject.md)

## Called from

- [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md)

