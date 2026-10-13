# sendCsatSurvey()

Create a CSAT response row and send the survey email. Returns an array: ['result' => <CSAT_RESULT_*>, 'response_id' => int|null]

Pass `$force` = true to bypass the one-per-ticket guard when the analyst
deliberately re-requests feedback.

Pre-flight checks (mode, template existence, mailbox availability) all run
BEFORE the row is inserted, so failed sends don't leave orphan tokens behind.

```php
function sendCsatSurvey(PDO $conn, int $ticketId, ?int $analystId, bool $force = false): array
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 276.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `?int` |  |  |
| `$force` | `bool` | `false` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 284 | `sendCsatSurvey` | read [ticket_csat_responses](/code/tables/ticket_csat_responses.md) |  |
| 306 | `sendCsatSurvey` | read [ticket_email_templates](/code/tables/ticket_email_templates.md) |  |
| 323 | `sendCsatSurvey` | **insert** [ticket_csat_responses](/code/tables/ticket_csat_responses.md) (`ticket_id`, `token`, `sent_datetime`, `analyst_id`, `created_at`) |  |

## Calls

[csatBuildUrl()](/code/functions/csatBuildUrl.md), [csatGenerateToken()](/code/functions/csatGenerateToken.md), [csatGetSetting()](/code/functions/csatGetSetting.md), [csatSendInChannel()](/code/functions/csatSendInChannel.md), [csatTicketChannel()](/code/functions/csatTicketChannel.md), [sendTemplateEmail()](/code/functions/sendTemplateEmail.md), [templateGetMailboxForTicket()](/code/functions/templateGetMailboxForTicket.md)

## Called from

- [api/tickets/request_csat.php](/code/files/api/tickets/request_csat.php.md)
- [includes/services/tickets.php](/code/files/includes/services/tickets.php.md) - in `TicketsService::updateTicket`

