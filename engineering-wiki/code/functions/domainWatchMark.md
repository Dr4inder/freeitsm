# domainWatchMark()

```php
function domainWatchMark(PDO $conn, int $id, string $marker): void
```

Defined in [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md), line 126.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$marker` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `domainWatchMark` | **delete** [domain_audit](/code/tables/domain_audit.md) |  |

## Called from

- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainScheduledRun()](/code/functions/domainScheduledRun.md)

