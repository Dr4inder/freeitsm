# apiLoadContract()

Loads one contract row the key may see (apiContractVisibility), or answers 404 and stops.

```php
function apiLoadContract(PDO $conn, int $contractId, array $apiKey): array
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 138.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$contractId` | `int` |  |  |
| `$apiKey` | `array` |  |  |

**Returns:** `array`

## Calls

[apiContractSelect()](/code/functions/apiContractSelect.md), [apiContractVisibility()](/code/functions/apiContractVisibility.md), [apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) - in [apiContractsGet()](/code/functions/apiContractsGet.md), [apiContractsCreate()](/code/functions/apiContractsCreate.md), [apiContractsUpdate()](/code/functions/apiContractsUpdate.md), [apiContractTermsGet()](/code/functions/apiContractTermsGet.md)

