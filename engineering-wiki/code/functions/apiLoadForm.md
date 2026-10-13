# apiLoadForm()

```php
function apiLoadForm(PDO $conn, int $formId): array
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiFormSelect()](/code/functions/apiFormSelect.md)

## Called from

- [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md) - in [apiFormsGet()](/code/functions/apiFormsGet.md), [apiFormsCreate()](/code/functions/apiFormsCreate.md), [apiFormsUpdate()](/code/functions/apiFormsUpdate.md), [apiFormVersionsList()](/code/functions/apiFormVersionsList.md), [apiFormVersionsCreate()](/code/functions/apiFormVersionsCreate.md), [apiFormSubmissionsList()](/code/functions/apiFormSubmissionsList.md)

