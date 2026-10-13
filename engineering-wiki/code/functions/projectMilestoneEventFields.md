# projectMilestoneEventFields()

A milestone as its events carry it (3.3.0). state: due | missed | done.

```php
function projectMilestoneEventFields(array $m): array
```

Defined in [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), line 291.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$m` | `array` |  |  |

**Returns:** `array`

## Calls

[projectMilestoneState()](/code/functions/projectMilestoneState.md)

## Called from

- [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) - in [projectAlertsMilestones()](/code/functions/projectAlertsMilestones.md)
- [includes/services/projects.php](/code/files/includes/services/projects.php.md) - in `ProjectsService::milestoneReached`

