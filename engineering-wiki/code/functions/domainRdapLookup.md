# domainRdapLookup()

Looks a domain up at its registry's RDAP server and reads the dates, statuses, locks, registrar, name servers, DNSSEC and registrant into the standard result shape.

A 404 comes back with not_found set, which callers treat as an answer rather than a failure.

```php
function domainRdapLookup(string $base, string $name): array
```

Defined in [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md), line 160.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$base` | `string` |  |  |
| `$name` | `string` |  |  |

**Returns:** `array`

## Calls

[domainBlankResult()](/code/functions/domainBlankResult.md), [domainDateOnly()](/code/functions/domainDateOnly.md), [domainDeriveFlags()](/code/functions/domainDeriveFlags.md), [domainHttpGet()](/code/functions/domainHttpGet.md), [domainLooksRedacted()](/code/functions/domainLooksRedacted.md), [domainNormaliseStatuses()](/code/functions/domainNormaliseStatuses.md), [domainVcardField()](/code/functions/domainVcardField.md)

## Called from

- [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md) - in [domainLookup()](/code/functions/domainLookup.md)

