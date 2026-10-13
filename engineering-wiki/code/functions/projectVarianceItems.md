# projectVarianceItems()

Dated items compared by id on one date column: [{name, kind: moved|added|removed, from, to, days}].

```php
function projectVarianceItems(array $base, array $now, string $col): array
```

Defined in [includes/projects/control.php](/code/files/includes/projects/control.php.md), line 176.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$base` | `array` |  |  |
| `$now` | `array` |  |  |
| `$col` | `string` |  |  |

**Returns:** `array`

## Calls

[projectDaysBetween()](/code/functions/projectDaysBetween.md)

## Called from

- [includes/projects/control.php](/code/files/includes/projects/control.php.md) - in [projectBaselineVariance()](/code/functions/projectBaselineVariance.md)

