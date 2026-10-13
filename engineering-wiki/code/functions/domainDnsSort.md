# domainDnsSort()

Puts records in a stable order so answers compare equal - MX by priority then host, CAA as given, everything else de-duplicated and sorted.

```php
function domainDnsSort(string $type, array $recs): array
```

Defined in [includes/domains/dns.php](/code/files/includes/domains/dns.php.md), line 136.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$type` | `string` |  |  |
| `$recs` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/domains/dns.php](/code/files/includes/domains/dns.php.md) - in [domainDnsSystem()](/code/functions/domainDnsSystem.md), [domainDnsDoh()](/code/functions/domainDnsDoh.md)

