# projectIdVisibleTo()

The same, by id - for callers holding only an id (Documents, the recent trail).

```php
function projectIdVisibleTo(PDO $conn, int $analystId, int $projectId): bool
```

Defined in [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), line 89.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$projectId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 92 | `projectIdVisibleTo` | read [projects](/code/tables/projects.md) |  |

## Calls

[projectVisibilityReady()](/code/functions/projectVisibilityReady.md), [projectVisibleTo()](/code/functions/projectVisibleTo.md)

## Called from

- [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) - in [recentTrailLabelsForType()](/code/functions/recentTrailLabelsForType.md)
- [includes/tenancy.php](/code/files/includes/tenancy.php.md) - in [analystCanAccessProject()](/code/functions/analystCanAccessProject.md)

