# projectLinksDeleteAll()

Remove every link a project holds - called when the project is deleted.

```php
function projectLinksDeleteAll(PDO $conn, int $projectId): void
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 419.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Returns:** `void`

## Calls

[projectLinkKinds()](/code/functions/projectLinkKinds.md)

## Called from

- [includes/services/projects.php](/code/files/includes/services/projects.php.md) - in `ProjectsService::deleteProject`

