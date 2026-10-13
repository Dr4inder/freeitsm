# apiSerializeForm()

```php
function apiSerializeForm(PDO $conn, array $r, bool $withFields = true): array
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 91.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$r` | `array` |  |  |
| `$withFields` | `bool` | `true` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 113 | `apiSerializeForm` | read [form_fields](/code/tables/form_fields.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md) - in [apiFormsList()](/code/functions/apiFormsList.md), [apiFormsGet()](/code/functions/apiFormsGet.md), [apiFormsCreate()](/code/functions/apiFormsCreate.md), [apiFormsUpdate()](/code/functions/apiFormsUpdate.md), [apiFormVersionsList()](/code/functions/apiFormVersionsList.md), [apiFormVersionsCreate()](/code/functions/apiFormVersionsCreate.md)

