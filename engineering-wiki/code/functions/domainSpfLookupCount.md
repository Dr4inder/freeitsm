# domainSpfLookupCount()

How many DNS lookups evaluating this SPF record costs (RFC 7208 §4.6.4 caps it at 10; past that, receivers treat the record as a permanent error — i.e. SPF silently stops protecting the domain). Follows include: and redirect=.

```php
function domainSpfLookupCount(
    string $spf,
    string $resolver,
    int $depth,
    array &$broken,
    array &$seen = []
): int
```

Defined in [includes/domains/checks.php](/code/files/includes/domains/checks.php.md), line 310.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$spf` | `string` |  |  |
| `$resolver` | `string` |  |  |
| `$depth` | `int` |  |  |
| `$broken` | `array` |  | collects include/redirect targets that have no SPF record |
| `$seen` | `array` | `[]` |  |

**Returns:** `int`

## Calls

[domainTxtStartingWith()](/code/functions/domainTxtStartingWith.md)

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md), [domainSpfLookupCount()](/code/functions/domainSpfLookupCount.md)

