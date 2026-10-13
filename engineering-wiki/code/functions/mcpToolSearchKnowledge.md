# mcpToolSearchKnowledge()

```php
function mcpToolSearchKnowledge(PDO $conn, array $args, int $analystId, array $apiKey): string
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 292.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |
| `$apiKey` | `array` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 299 | `mcpToolSearchKnowledge` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md)

*Nothing calls this function by name.*

