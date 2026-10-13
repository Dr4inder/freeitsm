# apiContractTermsGet()

Contract terms — GET + bulk upsert (mirrors save_contract_terms.php)

```php
function apiContractTermsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 389.

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
| 392 | `apiContractTermsGet` | read [contract_term_tabs](/code/tables/contract_term_tabs.md), read [contract_term_values](/code/tables/contract_term_values.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadContract()](/code/functions/apiLoadContract.md), [apiRespond()](/code/functions/apiRespond.md)

## Called from

- [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) - in [apiContractTermsSave()](/code/functions/apiContractTermsSave.md)

