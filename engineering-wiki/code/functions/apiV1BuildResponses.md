# apiV1BuildResponses()

Assemble the responses map: success code(s) + every error the endpoint can return.

```php
function apiV1BuildResponses(
    array $ep,
    array $extras,
    array $endpointToHandler,
    array $handlerSuccess,
    array $schemas
): array
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 216.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ep` | `array` |  |  |
| `$extras` | `array` |  |  |
| `$endpointToHandler` | `array` |  |  |
| `$handlerSuccess` | `array` |  |  |
| `$schemas` | `array` |  |  |

**Returns:** `array`

## Calls

[apiV1EndpointErrors()](/code/functions/apiV1EndpointErrors.md), [apiV1SuccessEnvelope()](/code/functions/apiV1SuccessEnvelope.md)

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildOperation()](/code/functions/apiV1BuildOperation.md)

