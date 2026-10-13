# domainDnsSystem()

Answers a DNS question with PHP's `dns_get_record()` (A, AAAA, MX, TXT, NS, CNAME and CAA where PHP has it), normalised and sorted.

```php
function domainDnsSystem(string $name, string $type): array
```

Defined in [includes/domains/dns.php](/code/files/includes/domains/dns.php.md), line 64.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$type` | `string` |  |  |

**Returns:** `array`

## Calls

[domainDnsSort()](/code/functions/domainDnsSort.md)

## Called from

- [includes/domains/dns.php](/code/files/includes/domains/dns.php.md) - in [domainDns()](/code/functions/domainDns.md)

