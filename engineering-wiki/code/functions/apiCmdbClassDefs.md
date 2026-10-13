# apiCmdbClassDefs()

Property definitions for a class, keyed by property_key.

```php
function apiCmdbClassDefs(PDO $conn, int $classId): array
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 184.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$classId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 186 | `apiCmdbClassDefs` | read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |

## Called from

- [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md) - in [apiCmdbObjectsGet()](/code/functions/apiCmdbObjectsGet.md)
- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmObjectProperties()](/code/functions/apiNmObjectProperties.md)

