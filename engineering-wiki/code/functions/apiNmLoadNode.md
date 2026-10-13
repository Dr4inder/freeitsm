# apiNmLoadNode()

```php
function apiNmLoadNode(PDO $conn, int $diagramId, int $nodeId): array
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 96.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |
| `$nodeId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 97 | `apiNmLoadNode` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmResolveEndpoint()](/code/functions/apiNmResolveEndpoint.md), [apiNmNodesUpdate()](/code/functions/apiNmNodesUpdate.md), [apiNmNodesDelete()](/code/functions/apiNmNodesDelete.md)

