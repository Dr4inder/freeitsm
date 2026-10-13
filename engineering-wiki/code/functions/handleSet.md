# handleSet()

```php
function handleSet(PDO $conn, int $analystId, array $in): void
```

Defined in [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md), line 161.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 166 | `handleSet` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Calls

[knowledgeAclResetCaches()](/code/functions/knowledgeAclResetCaches.md), [knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md), [knowledgeFolderPermissionModel()](/code/functions/knowledgeFolderPermissionModel.md)

## Called from

- [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md)

