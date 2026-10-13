# checklistTaskGate()

Refuse unless this analyst can reach the task. Same wording for "gone" and "not yours".

```php
function checklistTaskGate(PDO $conn, int $taskId): void
```

Defined in [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md), line 39.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |

**Returns:** `void`

## Calls

[analystCanAccessTask()](/code/functions/analystCanAccessTask.md)

## Called from

- [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

