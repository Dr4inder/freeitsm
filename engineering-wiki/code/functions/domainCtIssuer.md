# domainCtIssuer()

"C=US, O=Let's Encrypt, CN=R11" → "Let's Encrypt (R11)"

```php
function domainCtIssuer(string $dn): string
```

Defined in [includes/domains/watch.php](/code/files/includes/domains/watch.php.md), line 95.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dn` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/domains/watch.php](/code/files/includes/domains/watch.php.md) - in [domainCtScan()](/code/functions/domainCtScan.md)

