# projectAiAsk()

Ask the model. Returns ['text', 'model']. Throws RuntimeException when AI is not set up ('not_configured') or the provider cannot be reached.

```php
function projectAiAsk(PDO $conn, string $task, string $facts, int $maxTokens): array
```

Defined in [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), line 340.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$task` | `string` |  |  |
| `$facts` | `string` |  |  |
| `$maxTokens` | `int` |  |  |

**Returns:** `array`

## Calls

[aiProviderChat()](/code/functions/aiProviderChat.md), [aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [projectAiSystemPrompt()](/code/functions/projectAiSystemPrompt.md)

## Called from

- [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md) - in `ProjectReportsService::briefing`, `ProjectReportsService::draftWithAi`, `ProjectReportsService::draftScheduled`

