# apiNmRespondFull()

Respond with the full hydrated diagram (shared by create/update/version).

```php
function apiNmRespondFull(PDO $conn, int $diagramId, int $status = 200): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 548.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |
| `$status` | `int` | `200` |  |

**Returns:** `void`

## Calls

[apiNmConnectorsForDiagram()](/code/functions/apiNmConnectorsForDiagram.md), [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmNodeSelect()](/code/functions/apiNmNodeSelect.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeNmDiagram()](/code/functions/apiSerializeNmDiagram.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmDiagramsCreate()](/code/functions/apiNmDiagramsCreate.md), [apiNmDiagramsUpdate()](/code/functions/apiNmDiagramsUpdate.md), [apiNmVersionsCreate()](/code/functions/apiNmVersionsCreate.md)

