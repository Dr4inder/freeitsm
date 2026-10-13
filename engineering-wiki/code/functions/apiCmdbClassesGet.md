# apiCmdbClassesGet()

GET /cmdb/classes/{id} - one CMDB class with its property definitions and their options.

```php
function apiCmdbClassesGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 85.

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
| 87 | `apiCmdbClassesGet` | read [cmdb_classes](/code/tables/cmdb_classes.md), read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 97 | `apiCmdbClassesGet` | read [cmdb_class_properties](/code/tables/cmdb_class_properties.md), read [cmdb_classes](/code/tables/cmdb_classes.md) |  |
| 107 | `apiCmdbClassesGet` | read [cmdb_class_property_options](/code/tables/cmdb_class_property_options.md), read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

