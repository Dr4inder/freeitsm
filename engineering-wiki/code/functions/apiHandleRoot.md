# apiHandleRoot()

GET / — version + endpoint index.

```php
function apiHandleRoot(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/index.php](/code/files/api/v1/index.php.md), line 100.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

