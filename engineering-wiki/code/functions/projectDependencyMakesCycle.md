# projectDependencyMakesCycle()

Would task -> dependsOn close a loop (dependsOn already waits, directly or not, for task)?

```php
function projectDependencyMakesCycle(array $deps, int $taskId, int $dependsOnId): bool
```

Defined in [includes/projects/dependencies.php](/code/files/includes/projects/dependencies.php.md), line 47.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$deps` | `array` |  |  |
| `$taskId` | `int` |  |  |
| `$dependsOnId` | `int` |  |  |

**Returns:** `bool`

## Called from

- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::addTaskDependency`

