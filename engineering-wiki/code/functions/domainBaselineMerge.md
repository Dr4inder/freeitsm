# domainBaselineMerge()

Keep the previous value of a field when this run could not see it, so a one-off gap never erases what we knew (and never makes tomorrow's reappearance look like a change).

```php
function domainBaselineMerge(?array $old, array $new): array
```

Defined in [includes/domains/monitor.php](/code/files/includes/domains/monitor.php.md), line 77.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$old` | `?array` |  |  |
| `$new` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/services/domains.php](/code/files/includes/services/domains.php.md) - in `DomainsService::runChecks`

