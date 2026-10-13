# domainDns()

```php
function domainDns(string $name, string $type, string $resolver = 'system'): array
```

Defined in [includes/domains/dns.php](/code/files/includes/domains/dns.php.md), line 28.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$type` | `string` |  |  |
| `$resolver` | `string` | `'system'` |  |

**Returns:** array{ok:bool, nxdomain:bool, records:array, error:?string} records: A/AAAA → list of IPs; NS/CNAME → host names; MX → [[pri, host]]; TXT → strings; CAA → [[flags, tag, value]]; DS → [string] (presence is what matters)

## Calls

[domainDnsDoh()](/code/functions/domainDnsDoh.md), [domainDnsSystem()](/code/functions/domainDnsSystem.md)

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md)
- [includes/domains/dns.php](/code/files/includes/domains/dns.php.md) - in [domainTxtStartingWith()](/code/functions/domainTxtStartingWith.md)
- [includes/domains/watch.php](/code/files/includes/domains/watch.php.md) - in [domainLookalikeScan()](/code/functions/domainLookalikeScan.md)

