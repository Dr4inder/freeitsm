# projectMilestoneState()

done | missed | due - see the header.

```php
function projectMilestoneState(array $m, ?string $today = null): string
```

Defined in [includes/projects/milestones.php](/code/files/includes/projects/milestones.php.md), line 33.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$m` | `array` |  |  |
| `$today` | `?string` | `null` |  |

**Returns:** `string`

## Called from

- [api/projects/portfolio_charts.php](/code/files/api/projects/portfolio_charts.php.md)
- [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) - in [projectMilestoneEventFields()](/code/functions/projectMilestoneEventFields.md)
- [includes/projects/milestones.php](/code/files/includes/projects/milestones.php.md) - in [projectMilestones()](/code/functions/projectMilestones.md)

