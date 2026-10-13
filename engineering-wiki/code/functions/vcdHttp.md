# vcdHttp()

One HTTP call. Returns [status code, body, access token from the response headers]. Throws only when the server cannot be reached at all; HTTP errors are returned.

```php
function vcdHttp(
    array $c,
    string $method,
    string $path,
    array $headers,
    ?string $bearer = null,
    ?string $basic = null
): array
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 49.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$c` | `array` |  |  |
| `$method` | `string` |  |  |
| `$path` | `string` |  |  |
| `$headers` | `array` |  |  |
| `$bearer` | `?string` | `null` |  |
| `$basic` | `?string` | `null` |  |

**Returns:** `array`

## Called from

- [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md) - in [vcdLogin()](/code/functions/vcdLogin.md), [vcdLogout()](/code/functions/vcdLogout.md), [vcdTryGet()](/code/functions/vcdTryGet.md)

