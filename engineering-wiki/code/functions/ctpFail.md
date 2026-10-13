# ctpFail()

Sends an HTTP status and {success: false, error: `$code`} - a short code such as 'finished' that the candidate page acts on - then stops.

```php
function ctpFail(string $code, int $http = 400): void
```

Defined in [api/lms/test_public.php](/code/files/api/lms/test_public.php.md), line 28.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$code` | `string` |  |  |
| `$http` | `int` | `400` |  |

**Returns:** `void`

## Called from

- [api/lms/test_public.php](/code/files/api/lms/test_public.php.md)

