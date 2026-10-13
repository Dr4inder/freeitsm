# apiNmLoadConnector()

Loads one connector row that belongs to the given diagram, or answers 404 and stops.

```php
function apiNmLoadConnector(PDO $conn, int $diagramId, int $connectorId): array
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 113.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |
| `$connectorId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 114 | `apiNmLoadConnector` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmConnectorsUpdate()](/code/functions/apiNmConnectorsUpdate.md), [apiNmConnectorsDelete()](/code/functions/apiNmConnectorsDelete.md)

