# projectBenefitState()

The worked-out state and progress of one benefit, given its latest value.

```php
function projectBenefitState(array $b, ?float $now, ?string $today = null): array
```

Defined in [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md), line 45.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$b` | `array` |  |  |
| `$now` | `?float` |  |  |
| `$today` | `?string` | `null` |  |

**Returns:** `array`

## Called from

- [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md) - in [projectBenefits()](/code/functions/projectBenefits.md)

