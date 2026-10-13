# apiNmDiagramsUpdate()

PATCH /network-diagrams/{id} — partial metadata; sending nodes/connectors = full contents replace.

```php
function apiNmDiagramsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 558.

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

