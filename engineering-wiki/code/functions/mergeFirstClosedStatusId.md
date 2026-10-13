# mergeFirstClosedStatusId()

The install's first closed status id, or null if none is flagged.

```php
function mergeFirstClosedStatusId(PDO $conn): ?int
```

Defined in [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), line 603.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 605 | `mergeFirstClosedStatusId` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Called from

- [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md) - in [mergeOneTicket()](/code/functions/mergeOneTicket.md)

