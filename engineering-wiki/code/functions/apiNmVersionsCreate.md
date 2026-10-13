# apiNmVersionsCreate()

POST /network-diagrams/{id}/versions — clone the leaf forward (the editor's "New version").

```php
function apiNmVersionsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 591.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiNmRespondFull()](/code/functions/apiNmRespondFull.md)

*Nothing calls this function by name.*

