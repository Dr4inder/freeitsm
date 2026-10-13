# domainCtScan()

```php
function domainCtScan(PDO $conn, int $domainId, string $name): array
```

Defined in [includes/domains/watch.php](/code/files/includes/domains/watch.php.md), line 48.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |
| `$name` | `string` |  |  |

**Returns:** array{ok:bool, new:int, total:int, error:?string, first_scan:bool}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 57 | `domainCtScan` | read [domain_certificates](/code/tables/domain_certificates.md) |  |
| 62 | `domainCtScan` | **insert** [domain_certificates](/code/tables/domain_certificates.md) (`domain_id`, `crtsh_id`, `common_name`, `name_value`, `issuer`, `not_before`, `not_after`, `first_seen_datetime`, `acknowledged`) |  |

## Calls

[domainCtDate()](/code/functions/domainCtDate.md), [domainCtIssuer()](/code/functions/domainCtIssuer.md), [domainHttpGet()](/code/functions/domainHttpGet.md)

## Called from

- [api/domains/watch.php](/code/files/api/domains/watch.php.md)
- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainScheduledRun()](/code/functions/domainScheduledRun.md)

