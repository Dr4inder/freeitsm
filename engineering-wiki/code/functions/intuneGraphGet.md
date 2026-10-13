# intuneGraphGet()

GET a Graph URL, retrying on 429/5xx with Retry-After honoured.

```php
function intuneGraphGet(string $url, array $settings, int $maxRetries = 5): array
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 98.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$settings` | `array` |  |  |
| `$maxRetries` | `int` | `5` |  |

**Returns:** `array`

## Calls

[intuneGetToken()](/code/functions/intuneGetToken.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneRunSync()](/code/functions/intuneRunSync.md), [intuneFetchDeviceApps()](/code/functions/intuneFetchDeviceApps.md)

