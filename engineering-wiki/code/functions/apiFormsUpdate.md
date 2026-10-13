# apiFormsUpdate()

PATCH /forms/{id} — save_form.php's in-place save (id-based field sync).

```php
function apiFormsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 242.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadForm()](/code/functions/apiLoadForm.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeForm()](/code/functions/apiSerializeForm.md)

*Nothing calls this function by name.*

