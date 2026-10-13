# apiV1BuildOperation()

Build one OpenAPI Operation Object for a docs endpoint.

```php
function apiV1BuildOperation(
    array $ep,
    string $section,
    array $extras,
    array $endpointToHandler,
    array $handlerSuccess,
    array $schemas
): array
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 133.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ep` | `array` |  |  |
| `$section` | `string` |  |  |
| `$extras` | `array` |  |  |
| `$endpointToHandler` | `array` |  |  |
| `$handlerSuccess` | `array` |  |  |
| `$schemas` | `array` |  |  |

**Returns:** `array`

## Calls

[apiV1BuildResponses()](/code/functions/apiV1BuildResponses.md), [apiV1OperationId()](/code/functions/apiV1OperationId.md), [apiV1ParamDescription()](/code/functions/apiV1ParamDescription.md)

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildOpenApi()](/code/functions/apiV1BuildOpenApi.md)

