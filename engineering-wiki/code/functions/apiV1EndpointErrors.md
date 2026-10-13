# apiV1EndpointErrors()

The errors an endpoint can return: the common ones derived from its shape, plus any endpoint-specific ones from the docs extras. Mirrors the docs page's `errorsOf()` so the two never disagree. Returns [code => description].

```php
function apiV1EndpointErrors(array $ep, array $extras): array
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 263.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ep` | `array` |  |  |
| `$extras` | `array` |  |  |

**Returns:** `array`

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildResponses()](/code/functions/apiV1BuildResponses.md)

