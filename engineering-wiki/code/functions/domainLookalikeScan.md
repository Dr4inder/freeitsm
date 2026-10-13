# domainLookalikeScan()

Resolve the candidates and store the ones that exist.

```php
function domainLookalikeScan(
    PDO $conn,
    int $domainId,
    string $name,
    string $resolver = 'auto',
    float $budgetSeconds = 60
): array
```

Defined in [includes/domains/watch.php](/code/files/includes/domains/watch.php.md), line 174.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |
| `$name` | `string` |  |  |
| `$resolver` | `string` | `'auto'` |  |
| `$budgetSeconds` | `float` | `60` |  |

**Returns:** array{checked:int, found:int, new:int, with_mx:int}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 180 | `domainLookalikeScan` | **insert** [domain_lookalikes](/code/tables/domain_lookalikes.md) (`domain_id`, `lookalike`, `technique`, `has_a`, `has_mx`, `first_seen_datetime`, `last_seen_datetime`) |  |
| 186 | `domainLookalikeScan` | read [domain_lookalikes](/code/tables/domain_lookalikes.md) |  |

## Calls

[domainDns()](/code/functions/domainDns.md), [domainLookalikeCandidates()](/code/functions/domainLookalikeCandidates.md)

## Called from

- [api/domains/watch.php](/code/files/api/domains/watch.php.md)
- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainScheduledRun()](/code/functions/domainScheduledRun.md)

