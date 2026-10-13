# warbotToolListProjects()

list_projects: the projects the asker may see, ten by default, via `projectAssistList()`.

```php
function warbotToolListProjects(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 965.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Calls

[projectAssistList()](/code/functions/projectAssistList.md), [warbotProjectAnswer()](/code/functions/warbotProjectAnswer.md), [warbotProjectScope()](/code/functions/warbotProjectScope.md)

*Nothing calls this function by name.*

