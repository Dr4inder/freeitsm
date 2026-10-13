# domainNormaliseHost()

A host name (may be a sub-domain, keeps "www."), or null when it is not one.

```php
function domainNormaliseHost(string $h): ?string
```

Defined in [includes/domains/names.php](/code/files/includes/domains/names.php.md), line 116.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$h` | `string` |  |  |

**Returns:** `?string`

## Called from

- [includes/domains/names.php](/code/files/includes/domains/names.php.md) - in [domainParseSslHosts()](/code/functions/domainParseSslHosts.md)

