# domainLookalikeCandidates()

The look-alike candidates for a name, keyed by candidate => technique. Deliberately bounded (a few hundred at most): every candidate is two DNS queries.

```php
function domainLookalikeCandidates(string $name): array
```

Defined in [includes/domains/watch.php](/code/files/includes/domains/watch.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |

**Returns:** `array`

## Called from

- [includes/domains/watch.php](/code/files/includes/domains/watch.php.md) - in [domainLookalikeScan()](/code/functions/domainLookalikeScan.md)

