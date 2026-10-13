# projectChatMaturity()

How far the project is set up - a checklist the prompt is built around, and the panel's suggestion chips. stage: 'blank' (a name and little else), 'early', 'running'.

```php
function projectChatMaturity(PDO $conn, array $project): array
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 110.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$project` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 114 | `projectChatMaturity` | read [tasks](/code/tables/tasks.md) |  |
| 115 | `projectChatMaturity` | read [tasks](/code/tables/tasks.md) |  |
| 116 | `projectChatMaturity` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 117 | `projectChatMaturity` | read [project_stages](/code/tables/project_stages.md) |  |
| 118 | `projectChatMaturity` | read [project_members](/code/tables/project_members.md) |  |
| 119 | `projectChatMaturity` | read [tasks](/code/tables/tasks.md) |  |
| 120 | `projectChatMaturity` | read [project_raid](/code/tables/project_raid.md) |  |
| 121 | `projectChatMaturity` | read [project_raid](/code/tables/project_raid.md) |  |
| 122 | `projectChatMaturity` | read [project_items](/code/tables/project_items.md) |  |
| 123 | `projectChatMaturity` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 124 | `projectChatMaturity` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 125 | `projectChatMaturity` | read [project_change_requests](/code/tables/project_change_requests.md) |  |

## Called from

- [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md)
- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatTurn()](/code/functions/projectChatTurn.md), [projectChatOpen()](/code/functions/projectChatOpen.md)

