# apiChangesUpdate()

PATCH /changes/{id}

```php
function apiChangesUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 356.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadChange()](/code/functions/apiLoadChange.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeChange()](/code/functions/apiSerializeChange.md)

*Nothing calls this function by name.*

