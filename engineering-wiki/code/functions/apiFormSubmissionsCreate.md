# apiFormSubmissionsCreate()

POST /forms/{id}/submissions — submit_form.php: per-type validation, then the form.submitted workflow dispatch (after commit, errors swallowed).

```php
function apiFormSubmissionsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 356.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadFormSubmission()](/code/functions/apiLoadFormSubmission.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeFormSubmission()](/code/functions/apiSerializeFormSubmission.md)

*Nothing calls this function by name.*

