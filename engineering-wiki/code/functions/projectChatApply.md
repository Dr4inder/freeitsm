# projectChatApply()

Apply proposals of one assistant message - the indexes the person ticked - through the ordinary services, AS THEM. Stages before tasks, tasks before dependencies, so a proposal can name a stage or task proposed alongside it. Returns each item's result.

```php
function projectChatApply(
    PDO $conn,
    ActorContext $ctx,
    array $project,
    int $messageId,
    array $indexes,
    bool $dismiss = false
): array
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 459.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$project` | `array` |  |  |
| `$messageId` | `int` |  |  |
| `$indexes` | `array` |  |  |
| `$dismiss` | `bool` | `false` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 464 | `projectChatApply` | read [project_ai_messages](/code/tables/project_ai_messages.md) |  |
| 486 | `projectChatApply` | **update** [project_ai_messages](/code/tables/project_ai_messages.md) (`proposals`) |  |

## Calls

[projectChatApplyOne()](/code/functions/projectChatApplyOne.md), [projectChatThread()](/code/functions/projectChatThread.md)

## Called from

- [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md)

