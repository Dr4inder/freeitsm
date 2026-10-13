# searchBackfillRun()

```php
function searchBackfillRun(PDO $conn, array $opts = [], ?callable $progress = null): array
```

Defined in [includes/search/backfill.php](/code/files/includes/search/backfill.php.md), line 36.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$opts` | `array` | `[]` |  |
| `$progress` | `?callable` | `null` | fn(string `$stage`, int `$done`, int `$total`): void |

**Returns:** array{tickets:int,emails:int,notes:int,articles:int,skipped:int,seconds:float}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 62 | `searchBackfillRun` | read [tickets](/code/tables/tickets.md) |  |
| 66 | `searchBackfillRun` | read [tickets](/code/tables/tickets.md) |  |
| 101 | `searchBackfillRun` | read [tickets](/code/tables/tickets.md) |  |
| 122 | `searchBackfillRun` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[searchCorpusReady()](/code/functions/searchCorpusReady.md), [searchIndexArticle()](/code/functions/searchIndexArticle.md), [searchIndexTicket()](/code/functions/searchIndexTicket.md)

## Called from

- [api/system/search_rebuild.php](/code/files/api/system/search_rebuild.php.md)

