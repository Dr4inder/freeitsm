# apiNmNodesDelete()

```php
function apiNmNodesDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 791.

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
| 798 | `apiNmNodesDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 801 | `apiNmNodesDelete` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 802 | `apiNmNodesDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |

## Calls

[apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmLoadNode()](/code/functions/apiNmLoadNode.md), [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

