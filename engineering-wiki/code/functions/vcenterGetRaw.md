# vcenterGetRaw()

Raw GET request - returns decoded JSON without unwrapping 'value' key so we can see the exact API response structure

```php
function vcenterGetRaw($baseUrl, $path, $sessionToken)
```

Defined in [api/assets/debug_vcenter.php](/code/files/api/assets/debug_vcenter.php.md), line 222.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$baseUrl` |  |  |  |
| `$path` |  |  |  |
| `$sessionToken` |  |  |  |

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/assets/debug_vcenter.php](/code/files/api/assets/debug_vcenter.php.md)

