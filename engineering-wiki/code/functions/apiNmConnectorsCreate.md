# apiNmConnectorsCreate()

POST /network-diagrams/{id}/connectors — endpoints by node id or object id.

```php
function apiNmConnectorsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 818.

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
| 829 | `apiNmConnectorsCreate` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 841 | `apiNmConnectorsCreate` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |
| 848 | `apiNmConnectorsCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiNmConnectorHydrated()](/code/functions/apiNmConnectorHydrated.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md), [apiNmResolveEndpoint()](/code/functions/apiNmResolveEndpoint.md), [apiNmResolveRelationshipId()](/code/functions/apiNmResolveRelationshipId.md), [apiNmValidateLineStyle()](/code/functions/apiNmValidateLineStyle.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

