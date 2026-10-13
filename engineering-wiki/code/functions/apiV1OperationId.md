# apiV1OperationId()

A stable, unique operationId from method + path.

```php
function apiV1OperationId(string $method, string $path): string
```

Defined in [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md), line 299.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$method` | `string` |  |  |
| `$path` | `string` |  |  |

**Returns:** `string`

## Called from

- [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md) - in [apiV1BuildOperation()](/code/functions/apiV1BuildOperation.md)

