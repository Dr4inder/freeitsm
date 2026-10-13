# apiNmObjectProperties()

Typed property values for the distinct objects behind a diagram's nodes, keyed by object id.

```php
function apiNmObjectProperties(PDO $conn, array $nodeRows): array
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 530.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$nodeRows` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 539 | `apiNmObjectProperties` | read [cmdb_object_properties](/code/tables/cmdb_object_properties.md), read [cmdb_objects](/code/tables/cmdb_objects.md) |  |

## Calls

[apiCmdbClassDefs()](/code/functions/apiCmdbClassDefs.md), [apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmDiagramsGet()](/code/functions/apiNmDiagramsGet.md)

