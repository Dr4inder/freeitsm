# projectChatSummarise()

The memory: once more than PROJECT_CHAT_SUMMARISE_AT messages are not yet in the summary, everything but the latest PROJECT_CHAT_RECENT is folded into it - what was decided, what the user told it about the project, what is still open. Quiet: a failure leaves the conversation exactly as it was.

```php
function projectChatSummarise(PDO $conn, int $threadId, array $cfg): void
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 423.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$threadId` | `int` |  |  |
| `$cfg` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 426 | `projectChatSummarise` | read [project_ai_threads](/code/tables/project_ai_threads.md) |  |
| 430 | `projectChatSummarise` | read [project_ai_messages](/code/tables/project_ai_messages.md) |  |
| 448 | `projectChatSummarise` | **update** [project_ai_threads](/code/tables/project_ai_threads.md) (`summary`, `summary_upto_id`) |  |

## Calls

[aiProviderChat()](/code/functions/aiProviderChat.md), [projectAiLanguage()](/code/functions/projectAiLanguage.md)

## Called from

- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatTurn()](/code/functions/projectChatTurn.md)

