# projectChatApplyOne()

One proposal, through the service a person would have used.

```php
function projectChatApplyOne(PDO $conn, ActorContext $ctx, int $pid, string $type, array $a): void
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 491.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$pid` | `int` |  |  |
| `$type` | `string` |  |  |
| `$a` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 496 | `projectChatApplyOne` | read [project_stages](/code/tables/project_stages.md) |  |
| 500 | `projectChatApplyOne` | read [project_stages](/code/tables/project_stages.md) |  |
| 507 | `projectChatApplyOne` | read [tasks](/code/tables/tasks.md) |  |
| 511 | `projectChatApplyOne` | read [tasks](/code/tables/tasks.md) |  |
| 587 | `projectChatApplyOne` | read [project_roles](/code/tables/project_roles.md) |  |

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [projectToolDefinitions()](/code/functions/projectToolDefinitions.md)

## Called from

- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatApply()](/code/functions/projectChatApply.md)

