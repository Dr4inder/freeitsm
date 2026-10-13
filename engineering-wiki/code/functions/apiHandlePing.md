# apiHandlePing()

GET /ping — auth check + what this key can do.

```php
function apiHandlePing(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/index.php](/code/files/api/v1/index.php.md), line 194.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiRespond()](/code/functions/apiRespond.md), [getTenantById()](/code/functions/getTenantById.md)

*Nothing calls this function by name.*

