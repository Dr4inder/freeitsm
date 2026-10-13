# apiChangeCabSave()

POST /changes/{id}/cab — replace the roster (diff-sync + audit, like save_cab_members.php).

```php
function apiChangeCabSave(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 460.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiChangeCabGet()](/code/functions/apiChangeCabGet.md), [apiFailFromService()](/code/functions/apiFailFromService.md)

*Nothing calls this function by name.*

