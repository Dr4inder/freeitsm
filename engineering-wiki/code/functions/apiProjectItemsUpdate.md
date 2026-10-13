# apiProjectItemsUpdate()

PATCH /projects/{id}/items/{itemId} - updates the scope item fields sent through ProjectToolsService and returns the item.

```php
function apiProjectItemsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 414.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectCtx()](/code/functions/apiProjectCtx.md), [apiProjectItem()](/code/functions/apiProjectItem.md), [apiProjectTry()](/code/functions/apiProjectTry.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProjectItem()](/code/functions/apiSerializeProjectItem.md)

*Nothing calls this function by name.*

