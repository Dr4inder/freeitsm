# apiRequirePermission()

Enforce the per-key permission map. 403s (with the missing permission named) on failure.

```php
function apiRequirePermission(array $apiKey, string $resource, string $action): void
```

Defined in [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md), line 102.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$apiKey` | `array` |  | The API key that authenticated the call - its scopes and company limit. *([standard](/handbook/standard-parameters.md))* |
| `$resource` | `string` |  |  |
| `$action` | `string` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/index.php](/code/files/api/v1/index.php.md)
- [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md) - in [apiCostCentresSync()](/code/functions/apiCostCentresSync.md)

