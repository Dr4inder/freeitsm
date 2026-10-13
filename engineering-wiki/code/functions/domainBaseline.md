# domainBaseline()

Build the baseline from a domain row plus the check snapshot.

```php
function domainBaseline(array $d, array $snapshot): array
```

Defined in [includes/domains/monitor.php](/code/files/includes/domains/monitor.php.md), line 30.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `array` |  |  |
| `$snapshot` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/services/domains.php](/code/files/includes/services/domains.php.md) - in `DomainsService::runChecks`

