# apiNmNodesCreate()

POST /network-diagrams/{id}/nodes — add one node (object) or a batch ({"nodes": [...]}).

```php
function apiNmNodesCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 695.

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
| 715 | `apiNmNodesCreate` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 728 | `apiNmNodesCreate` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 740 | `apiNmNodesCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiNmAutoPlacer()](/code/functions/apiNmAutoPlacer.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmNodeSelect()](/code/functions/apiNmNodeSelect.md), [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md), [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

