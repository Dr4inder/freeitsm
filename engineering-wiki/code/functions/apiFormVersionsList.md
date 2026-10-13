# apiFormVersionsList()

GET /forms/{id}/versions — the whole chain, oldest first (list_versions.php).

```php
function apiFormVersionsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 284.

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
| 290 | `apiFormVersionsList` | read [forms](/code/tables/forms.md) |  |
| 301 | `apiFormVersionsList` | read [forms](/code/tables/forms.md) |  |

## Calls

[apiFormSelect()](/code/functions/apiFormSelect.md), [apiLoadForm()](/code/functions/apiLoadForm.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeForm()](/code/functions/apiSerializeForm.md)

*Nothing calls this function by name.*

