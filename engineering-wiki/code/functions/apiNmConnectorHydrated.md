# apiNmConnectorHydrated()

Load one connector by id fully hydrated (for single-op responses).

```php
function apiNmConnectorHydrated(PDO $conn, int $diagramId, int $connectorId): array
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 264.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |
| `$connectorId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiNmConnectorsForDiagram()](/code/functions/apiNmConnectorsForDiagram.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmConnectorsCreate()](/code/functions/apiNmConnectorsCreate.md), [apiNmConnectorsUpdate()](/code/functions/apiNmConnectorsUpdate.md)

