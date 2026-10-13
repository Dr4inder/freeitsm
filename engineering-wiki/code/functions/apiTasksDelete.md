# apiTasksDelete()

DELETE /tasks/{id} — hard delete. Children removed explicitly, not via FK cascade: installs grown via Database Verify were missing the parent and comments cascade FKs, which orphaned subtasks/comments (same fix as the UI's delete.php).

```php
function apiTasksDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 404.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

