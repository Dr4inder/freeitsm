# intuneGetToken()

Acquire a Graph access token via client-credentials. Cached for the lifetime of the PHP process (token TTL is ~1h).

```php
function intuneGetToken(array $settings): string
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 51.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$settings` | `array` |  |  |

**Returns:** `string`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneGraphGet()](/code/functions/intuneGraphGet.md), [intuneRunSync()](/code/functions/intuneRunSync.md)

