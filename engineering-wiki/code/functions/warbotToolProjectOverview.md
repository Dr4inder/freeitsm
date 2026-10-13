# warbotToolProjectOverview()

project_overview: one project's overview via `projectAssistOverview()`, scoped to the projects the asker may see.

```php
function warbotToolProjectOverview(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 973.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Calls

[projectAssistOverview()](/code/functions/projectAssistOverview.md), [warbotProjectAnswer()](/code/functions/warbotProjectAnswer.md), [warbotProjectScope()](/code/functions/warbotProjectScope.md)

*Nothing calls this function by name.*

