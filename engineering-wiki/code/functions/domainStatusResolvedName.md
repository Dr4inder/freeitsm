# domainStatusResolvedName()

The first active "resolved" incident status, by its own order.

```php
function domainStatusResolvedName(PDO $conn): ?string
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 205.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 207 | `domainStatusResolvedName` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

## Called from

- [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) - in [domainStatusRun()](/code/functions/domainStatusRun.md)

