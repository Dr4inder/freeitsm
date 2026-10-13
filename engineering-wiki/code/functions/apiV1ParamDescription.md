# apiV1ParamDescription()

Pull a parameter description from the docs params for a given name/in.

```php
function apiV1ParamDescription(array $ep, string $name, string $in): string
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 305.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ep` | `array` |  |  |
| `$name` | `string` |  |  |
| `$in` | `string` |  |  |

**Returns:** `string`

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildOperation()](/code/functions/apiV1BuildOperation.md)

