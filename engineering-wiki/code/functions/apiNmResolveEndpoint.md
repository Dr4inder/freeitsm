# apiNmResolveEndpoint()

Resolve a connector endpoint to a node id on this diagram. Accepts {prefix}_node_id or {prefix}_object_id (422 if the object isn't on the diagram, or is on it more than once — use node ids to disambiguate).

```php
function apiNmResolveEndpoint(PDO $conn, int $diagramId, array $body, string $prefix): int
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 333.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |
| `$body` | `array` |  |  |
| `$prefix` | `string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 341 | `apiNmResolveEndpoint` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiNmLoadNode()](/code/functions/apiNmLoadNode.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmConnectorsCreate()](/code/functions/apiNmConnectorsCreate.md)

