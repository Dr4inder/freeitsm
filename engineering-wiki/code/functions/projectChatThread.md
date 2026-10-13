# projectChatThread()

The conversation this person has on this project (per the memory setting); created on first use when `$create`.

```php
function projectChatThread(PDO $conn, int $projectId, int $analystId, bool $create): ?array
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 77.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$create` | `bool` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 81 | `projectChatThread` | read [project_ai_threads](/code/tables/project_ai_threads.md) |  |
| 82 | `projectChatThread` | read [project_ai_threads](/code/tables/project_ai_threads.md) |  |
| 86 | `projectChatThread` | **insert** [project_ai_threads](/code/tables/project_ai_threads.md) (`project_id`, `analyst_id`, `created_datetime`, `updated_datetime`) |  |

## Calls

[projectSetting()](/code/functions/projectSetting.md)

## Called from

- [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md)
- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatThread()](/code/functions/projectChatThread.md), [projectChatTurn()](/code/functions/projectChatTurn.md), [projectChatOpen()](/code/functions/projectChatOpen.md), [projectChatApply()](/code/functions/projectChatApply.md), [projectChatClear()](/code/functions/projectChatClear.md)

