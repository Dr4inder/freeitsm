# apiSerializeFormSubmission()

Shapes a submission for the API with every answer beside its field - checkbox answers decoded to lists, and a table's answer decoded to rows with its column definitions (retired columns included and marked).

```php
function apiSerializeFormSubmission(PDO $conn, array $r): array
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 148.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$r` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 152 | `apiSerializeFormSubmission` | read [form_submission_data](/code/tables/form_submission_data.md), read [form_fields](/code/tables/form_fields.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md) - in [apiFormSubmissionsList()](/code/functions/apiFormSubmissionsList.md), [apiFormSubmissionsGet()](/code/functions/apiFormSubmissionsGet.md), [apiFormSubmissionsCreate()](/code/functions/apiFormSubmissionsCreate.md)

