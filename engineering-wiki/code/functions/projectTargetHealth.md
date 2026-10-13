# projectTargetHealth()

green | amber | red for a live target; null when there is nothing to measure.

```php
function projectTargetHealth(int $done, int $total, ?string $due, string $setOn): ?string
```

Defined in [includes/projects/targets.php](/code/files/includes/projects/targets.php.md), line 158.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$done` | `int` |  |  |
| `$total` | `int` |  |  |
| `$due` | `?string` |  |  |
| `$setOn` | `string` |  |  |

**Returns:** `?string`

## Called from

- [includes/projects/targets.php](/code/files/includes/projects/targets.php.md) - in [projectTargetsFor()](/code/functions/projectTargetsFor.md)

