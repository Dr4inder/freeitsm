# domainStatusReady()

```php
function domainStatusReady(PDO $conn): bool
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 40.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 45 | `domainStatusReady` | read [domain_status_incidents](/code/tables/domain_status_incidents.md) |  |
| 46 | `domainStatusReady` | read [domain_status_services](/code/tables/domain_status_services.md) |  |

## Called from

- [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) - in [domainStatusState()](/code/functions/domainStatusState.md), [domainStatusRaise()](/code/functions/domainStatusRaise.md), [domainStatusRun()](/code/functions/domainStatusRun.md)

