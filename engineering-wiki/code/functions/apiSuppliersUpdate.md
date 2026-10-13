# apiSuppliersUpdate()

PATCH /suppliers/{id} - updates a supplier through ContractsService and returns it.

```php
function apiSuppliersUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 442.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeSupplier()](/code/functions/apiSerializeSupplier.md)

*Nothing calls this function by name.*

