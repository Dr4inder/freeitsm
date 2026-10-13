# catalogueSubmissionBodyHtml()

The submitted answers as a safe (fully-escaped) HTML summary for the ticket body.

```php
function catalogueSubmissionBodyHtml(PDO $conn, int $submissionId, string $formTitle): string
```

Defined in [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md), line 501.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$submissionId` | `int` |  |  |
| `$formTitle` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 503 | `catalogueSubmissionBodyHtml` | read [form_submission_data](/code/tables/form_submission_data.md), read [form_fields](/code/tables/form_fields.md) |  |

## Calls

[catalogueAnswerText()](/code/functions/catalogueAnswerText.md)

## Called from

- [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md) - in [catalogueCreateTicketFromSubmission()](/code/functions/catalogueCreateTicketFromSubmission.md)

