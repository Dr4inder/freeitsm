# ctFail()

Sends an HTTP status and {success: false, error}, then stops.

```php
function ctFail(string $e, int $code = 400): void
```

Defined in [api/lms/tests.php](/code/files/api/lms/tests.php.md), line 35.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$e` | `string` |  |  |
| `$code` | `int` | `400` |  |

**Returns:** `void`

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md) - in [ctLoadSitting()](/code/functions/ctLoadSitting.md)

