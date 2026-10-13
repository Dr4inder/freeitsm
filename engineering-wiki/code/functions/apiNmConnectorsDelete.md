# apiNmConnectorsDelete()

DELETE /network-diagrams/{id}/connectors/{connector_id}

```php
function apiNmConnectorsDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 921.

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
| 926 | `apiNmConnectorsDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 927 | `apiNmConnectorsDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |

## Calls

[apiNmLoadConnector()](/code/functions/apiNmLoadConnector.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

