# apiLoadFormSubmission()

```php
function apiLoadFormSubmission(PDO $conn, int $formId, int $submissionId): array
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 188.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$submissionId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 190 | `apiLoadFormSubmission` | read [form_submissions](/code/tables/form_submissions.md), read [forms](/code/tables/forms.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md) - in [apiFormSubmissionsGet()](/code/functions/apiFormSubmissionsGet.md), [apiFormSubmissionsCreate()](/code/functions/apiFormSubmissionsCreate.md)

