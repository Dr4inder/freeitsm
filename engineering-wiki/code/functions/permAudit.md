# permAudit()

Permission changes are the rows people actually come looking for. Never silent.

```php
function permAudit(PDO $conn, string $type, int $id, int $analystId, array $detail): void
```

Defined in [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), line 359.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$type` | `string` |  |  |
| `$id` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$detail` | `array` |  |  |

**Returns:** `void`

## Calls

[knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md)

## Called from

- [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md) - in [handleSetMode()](/code/functions/handleSetMode.md), [handleAdd()](/code/functions/handleAdd.md), [handleRemove()](/code/functions/handleRemove.md)

