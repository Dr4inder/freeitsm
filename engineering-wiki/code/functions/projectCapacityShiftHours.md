# projectCapacityShiftHours()

Length of a rota shift in hours; a shift that ends at or before it starts runs past midnight.

```php
function projectCapacityShiftHours(string $start, string $end): float
```

Defined in [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md), line 57.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$start` | `string` |  |  |
| `$end` | `string` |  |  |

**Returns:** `float`

## Called from

- [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md) - in [projectCapacity()](/code/functions/projectCapacity.md)

