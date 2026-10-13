# warbotProjectAnswer()

A ServiceError (no such project, several match) is an answer to give the room, not a failure.

```php
function warbotProjectAnswer(callable $fn): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 921.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `callable` |  |  |

**Returns:** `string`

## Called from

- [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) - in [warbotToolListProjects()](/code/functions/warbotToolListProjects.md), [warbotToolProjectOverview()](/code/functions/warbotToolProjectOverview.md), [warbotToolProjectRaid()](/code/functions/warbotToolProjectRaid.md), [warbotToolProjectTasks()](/code/functions/warbotToolProjectTasks.md), [warbotToolProjectDates()](/code/functions/warbotToolProjectDates.md)

