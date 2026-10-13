# apiProjectDecorate()

Decorate rows (health, progress, exceptions, budget) the way the portfolio does.

```php
function apiProjectDecorate(PDO $conn, array $rows): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 48.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$rows` | `array` |  |  |

**Returns:** `array`

## Calls

[projectDecorate()](/code/functions/projectDecorate.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectTaskStats()](/code/functions/projectTaskStats.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectsList()](/code/functions/apiProjectsList.md)

