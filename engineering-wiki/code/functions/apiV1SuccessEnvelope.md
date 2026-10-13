# apiV1SuccessEnvelope()

Wrap a data schema (or a generic object) in the { data, meta? } envelope.

```php
function apiV1SuccessEnvelope(?array $dataSchema): array
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 247.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dataSchema` | `?array` |  |  |

**Returns:** `array`

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildResponses()](/code/functions/apiV1BuildResponses.md)

