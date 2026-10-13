# knowledgeAuditView()

Record that somebody read an article — at most once per person per day.

The de-duplication is a SELECT before the INSERT rather than a unique key on
a date column, because the same table holds every other action too and a
unique key covering them would stop somebody editing an article twice in one
day. The race (two tabs, same second) would at worst write two rows, which is
a cosmetic duplicate rather than a wrong answer — the alternative, locking a
log table on every article read, is not worth that.

```php
function knowledgeAuditView(PDO $conn, int $articleId, ?int $analyst, ?int $user = null): void
```

Defined in [includes/knowledge/audit.php](/code/files/includes/knowledge/audit.php.md), line 83.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$articleId` | `int` |  |  |
| `$analyst` | `?int` |  |  |
| `$user` | `?int` | `null` |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 88 | `knowledgeAuditView` | read [knowledge_audit](/code/tables/knowledge_audit.md) |  |

## Calls

[knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md)

*Nothing calls this function by name.*

