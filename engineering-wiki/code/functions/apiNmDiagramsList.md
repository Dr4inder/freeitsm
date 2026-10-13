# apiNmDiagramsList()

GET /network-diagrams — current versions by default; ?all_versions=true for everything.

```php
function apiNmDiagramsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 439.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 443 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 452 | `apiNmDiagramsList` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 467 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |

## Calls

[apiNmDiagramSelect()](/code/functions/apiNmDiagramSelect.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeNmDiagram()](/code/functions/apiSerializeNmDiagram.md)

*Nothing calls this function by name.*

