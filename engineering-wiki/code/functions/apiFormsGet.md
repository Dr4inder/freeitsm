# apiFormsGet()

GET /forms/{id} - one form with its fields.

```php
function apiFormsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 249.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadForm()](/code/functions/apiLoadForm.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeForm()](/code/functions/apiSerializeForm.md)

*Nothing calls this function by name.*

