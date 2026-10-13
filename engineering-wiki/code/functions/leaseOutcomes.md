# leaseOutcomes()

Outcomes, in order. `$activeOnly` drops switched-off ones (still shown where in use).

```php
function leaseOutcomes(PDO $conn, bool $activeOnly = false): array
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$activeOnly` | `bool` | `false` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 123 | `leaseOutcomes` | read [lease_outcomes](/code/tables/lease_outcomes.md) |  |

## Calls

[leaseReady()](/code/functions/leaseReady.md)

## Called from

- [api/assets/get_lease_outcomes.php](/code/files/api/assets/get_lease_outcomes.php.md)
- [api/assets/leases/options.php](/code/files/api/assets/leases/options.php.md)

