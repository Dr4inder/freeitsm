# apiProjectItemsList()

GET /projects/{id}/items - the project's scope items.

```php
function apiProjectItemsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 396.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadProject()](/code/functions/apiLoadProject.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

