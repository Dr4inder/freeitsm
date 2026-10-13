# projectChatMessages()

Every message of a thread, oldest first, shaped for the panel.

```php
function projectChatMessages(PDO $conn, int $threadId): array
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 92.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$threadId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 94 | `projectChatMessages` | read [project_ai_messages](/code/tables/project_ai_messages.md), read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md)
- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatTurn()](/code/functions/projectChatTurn.md), [projectChatOpen()](/code/functions/projectChatOpen.md)

