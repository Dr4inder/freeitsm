# leaseDefaultOutcomeId()

The outcome a newly added asset starts with: the default, else the first active kind.

```php
function leaseDefaultOutcomeId(PDO $conn): ?int
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 130.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 132 | `leaseDefaultOutcomeId` | read [lease_outcomes](/code/tables/lease_outcomes.md) |  |

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseAssetsAdd()](/code/functions/leaseAssetsAdd.md)

