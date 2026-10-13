# projectChatSystem()

The standing instructions, the set-up checklist, the memory and the project, for one turn.

```php
function projectChatSystem(
    PDO $conn,
    array $project,
    int $analystId,
    array $maturity,
    ?string $summary,
    bool $canChange
): string
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 146.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$project` | `array` |  |  |
| `$analystId` | `int` |  |  |
| `$maturity` | `array` |  |  |
| `$summary` | `?string` |  |  |
| `$canChange` | `bool` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 148 | `projectChatSystem` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectAiFacts()](/code/functions/projectAiFacts.md), [projectAiLanguage()](/code/functions/projectAiLanguage.md), [projectEnabledTools()](/code/functions/projectEnabledTools.md), [projectToolDefinitions()](/code/functions/projectToolDefinitions.md)

## Called from

- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatTurn()](/code/functions/projectChatTurn.md)

