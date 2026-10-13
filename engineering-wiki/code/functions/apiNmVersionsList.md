# apiNmVersionsList()

GET /network-diagrams/{id}/versions — the whole chain, oldest first.

```php
function apiNmVersionsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 613.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiNmChainIds()](/code/functions/apiNmChainIds.md), [apiNmDiagramSelect()](/code/functions/apiNmDiagramSelect.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeNmDiagram()](/code/functions/apiSerializeNmDiagram.md)

*Nothing calls this function by name.*

