# apiProjectItemsCreate()

POST /projects/{id}/items - adds a scope item through ProjectToolsService and returns it.

```php
function apiProjectItemsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 403.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectCtx()](/code/functions/apiProjectCtx.md), [apiProjectItem()](/code/functions/apiProjectItem.md), [apiProjectTry()](/code/functions/apiProjectTry.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProjectItem()](/code/functions/apiSerializeProjectItem.md)

*Nothing calls this function by name.*

