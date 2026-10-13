# domainTxtStartingWith()

The TXT records at `$name` that start with `$prefix` (case-insensitive), e.g. "v=spf1".

```php
function domainTxtStartingWith(string $name, string $prefix, string $resolver): array
```

Defined in [includes/domains/dns.php](/code/files/includes/domains/dns.php.md), line 133.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$prefix` | `string` |  |  |
| `$resolver` | `string` |  |  |

**Returns:** `array`

## Calls

[domainDns()](/code/functions/domainDns.md)

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md), [domainSpfLookupCount()](/code/functions/domainSpfLookupCount.md)

