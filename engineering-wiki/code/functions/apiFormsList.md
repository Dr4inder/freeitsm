# apiFormsList()

GET /forms — one row per chain (the current version), like the module list.

```php
function apiFormsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 209.

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
| 210 | `apiFormsList` | read [forms](/code/tables/forms.md) |  |

## Calls

[apiFormSelect()](/code/functions/apiFormSelect.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeForm()](/code/functions/apiSerializeForm.md)

*Nothing calls this function by name.*

