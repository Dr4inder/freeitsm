# apiParseDateOnly()

Validate a DATE field (YYYY-MM-DD); 422 naming the field on garbage. Null/'' clears. Kept here (not in AssetsService) because contracts.php + tasks.php share it as a generic API date-parameter validator.

```php
function apiParseDateOnly($value, string $field): ?string
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 205.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

**Returns:** `?string`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) - in [apiContractsList()](/code/functions/apiContractsList.md)
- [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md) - in [apiTasksList()](/code/functions/apiTasksList.md)

