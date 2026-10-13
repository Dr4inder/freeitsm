# projectCapacityWorkdays()

The working days from `$from` to `$to` inclusive, as Y-m-d. `$days`: ISO weekdays (1 = Monday), Monday to Friday by default.

```php
function projectCapacityWorkdays(string $from, string $to, array $days = [1, 2, 3, 4, 5]): array
```

Defined in [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md), line 47.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$from` | `string` |  |  |
| `$to` | `string` |  |  |
| `$days` | `array` | `[1, 2, 3, 4, 5]` |  |

**Returns:** `array`

## Called from

- [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md) - in [projectCapacity()](/code/functions/projectCapacity.md)

