# domainStatusRow()

One domain row with the fields the problem test needs (alerts_enabled from its status).

```php
function domainStatusRow(PDO $conn, int $domainId): ?array
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 83.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 86 | `domainStatusRow` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |

## Called from

- [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) - in [domainStatusState()](/code/functions/domainStatusState.md), [domainStatusRaise()](/code/functions/domainStatusRaise.md), [domainStatusRun()](/code/functions/domainStatusRun.md)

