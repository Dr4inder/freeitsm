# apiProjectHistory()

GET /projects/{id}/history - newest first, paged.

```php
function apiProjectHistory(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 600.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 604 | `apiProjectHistory` | read [project_audit](/code/tables/project_audit.md) |  |
| 607 | `apiProjectHistory` | read [project_audit](/code/tables/project_audit.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadProject()](/code/functions/apiLoadProject.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

