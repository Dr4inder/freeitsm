# apiNmConnectorsUpdate()

```php
function apiNmConnectorsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 854.

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
| 870 | `apiNmConnectorsUpdate` | **update** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`cmdb_relationship_id`, `label`, `line_style`) |  |
| 881 | `apiNmConnectorsUpdate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiNmConnectorHydrated()](/code/functions/apiNmConnectorHydrated.md), [apiNmLoadConnector()](/code/functions/apiNmLoadConnector.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md), [apiNmResolveRelationshipId()](/code/functions/apiNmResolveRelationshipId.md), [apiNmValidateLineStyle()](/code/functions/apiNmValidateLineStyle.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

