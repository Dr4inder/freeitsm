# apiCmdbIconsList()

GET /cmdb-icons - the icon catalogue (key, label, active), the valid values for a node's icon_override.

```php
function apiCmdbIconsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 939.

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
| 941 | `apiCmdbIconsList` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

