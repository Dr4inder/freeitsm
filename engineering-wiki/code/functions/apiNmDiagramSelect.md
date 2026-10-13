# apiNmDiagramSelect()

```php
function apiNmDiagramSelect(): string
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 70.

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 71 | `apiNmDiagramSelect` | read [network_diagrams](/code/tables/network_diagrams.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [network_diagram_connectors](/code/tables/network_diagram_connectors.md), read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md), [apiNmDiagramsList()](/code/functions/apiNmDiagramsList.md), [apiNmVersionsList()](/code/functions/apiNmVersionsList.md)

