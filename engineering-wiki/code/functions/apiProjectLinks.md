# apiProjectLinks()

GET /projects/{id}/links - what it is connected to, only the kinds the key's analyst may open.

```php
function apiProjectLinks(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 641.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectCtx()](/code/functions/apiProjectCtx.md), [apiProjectTry()](/code/functions/apiProjectTry.md), [apiRespond()](/code/functions/apiRespond.md), [projectLinks()](/code/functions/projectLinks.md)

*Nothing calls this function by name.*

