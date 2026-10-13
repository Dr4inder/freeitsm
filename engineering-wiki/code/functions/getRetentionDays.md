# getRetentionDays()

```php
function getRetentionDays($conn)
```

Defined in [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md), line 125.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 126 | `getRetentionDays` | read [system_settings](/code/tables/system_settings.md) |  |

## Called from

- [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md) - in [handleList()](/code/functions/handleList.md), [purgeExpired()](/code/functions/purgeExpired.md)

