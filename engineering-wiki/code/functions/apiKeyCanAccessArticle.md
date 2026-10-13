# apiKeyCanAccessArticle()

May this key act on this article? Shared (NULL) articles belong to everyone.

```php
function apiKeyCanAccessArticle(PDO $conn, array $apiKey, int $articleId): bool
```

Defined in [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md), line 316.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$articleId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 320 | `apiKeyCanAccessArticle` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[isMultiTenant()](/code/functions/isMultiTenant.md)

*Nothing calls this function by name.*

