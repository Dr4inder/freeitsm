# projectCanCreate()

```php
function projectCanCreate(PDO $conn, int $analystId): bool
```

Defined in [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), line 398.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `bool`

## Calls

[projectIsManager()](/code/functions/projectIsManager.md), [projectSetting()](/code/functions/projectSetting.md)

## Called from

- [api/projects/list.php](/code/files/api/projects/list.php.md)
- [includes/services/projects.php](/code/files/includes/services/projects.php.md) - in `ProjectsService::createProject`

