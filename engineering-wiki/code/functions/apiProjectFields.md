# apiProjectFields()

Only the fields the service accepts, so a body cannot reach a column it should not.

```php
function apiProjectFields(array $body): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 143.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$body` | `array` |  |  |

**Returns:** `array`

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectsCreate()](/code/functions/apiProjectsCreate.md), [apiProjectsUpdate()](/code/functions/apiProjectsUpdate.md)

