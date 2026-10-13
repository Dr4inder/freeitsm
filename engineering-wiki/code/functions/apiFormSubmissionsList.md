# apiFormSubmissionsList()

```php
function apiFormSubmissionsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), line 317.

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
| 330 | `apiFormSubmissionsList` | read [form_submissions](/code/tables/form_submissions.md) |  |

## Calls

[apiFormSubmissionsSelect()](/code/functions/apiFormSubmissionsSelect.md), [apiLoadForm()](/code/functions/apiLoadForm.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeFormSubmission()](/code/functions/apiSerializeFormSubmission.md)

*Nothing calls this function by name.*

