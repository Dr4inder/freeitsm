# apiSerializeContract()

Shapes a contract row for the API - number, title, company, supplier or customer (company and person), owner, status, dates, value and the rest of the record.

```php
function apiSerializeContract(array $r): array
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 88.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

**Returns:** `array`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) - in [apiContractsGet()](/code/functions/apiContractsGet.md), [apiContractsCreate()](/code/functions/apiContractsCreate.md), [apiContractsUpdate()](/code/functions/apiContractsUpdate.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::fullObjectLoaders`

