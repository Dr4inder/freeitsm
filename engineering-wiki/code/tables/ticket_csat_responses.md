# ticket_csat_responses

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `ticket_id` | `INT NOT NULL` |  |
| `token` | `VARCHAR(64) NOT NULL` |  |
| `sent_datetime` | `DATETIME NULL` |  |
| `responded_datetime` | `DATETIME NULL` |  |
| `rating` | `TINYINT NULL` |  |
| `comment` | `TEXT NULL` |  |
| `analyst_id` | `INT NULL` |  |
| `created_at` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `channel_id` | `INT NULL` | PR #166 - which chat a rating request was asked in (NULL = emailed). |
| `channel_from` | `VARCHAR(255) NULL` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/csat.php](/code/files/includes/csat.php.md):180 | `csatSendInChannel` | insert | `ticket_id`, `token`, `sent_datetime`, `analyst_id`, `created_at`, `channel_id`, `channel_from` |  |
| [includes/csat.php](/code/files/includes/csat.php.md):190 | `csatSendInChannel` | delete |  |  |
| [includes/csat.php](/code/files/includes/csat.php.md):259 | `csatRecordRating` | update | `rating`, `responded_datetime` |  |
| [includes/csat.php](/code/files/includes/csat.php.md):323 | `sendCsatSurvey` | insert | `ticket_id`, `token`, `sent_datetime`, `analyst_id`, `created_at` |  |
| [tickets/csat/survey.php](/code/files/tickets/csat/survey.php.md):65 |  | update | `rating`, `comment`, `responded_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/debug-tools/D002_delete_ticket.php](/code/files/api/system/debug-tools/D002_delete_ticket.php.md) | L323 |  |
| [includes/csat.php](/code/files/includes/csat.php.md) | csatPendingRequestForChat L211, csatResponseBelongsToChat L233, csatStoredRating L244, sendCsatSurvey L284 |  |
| [tickets/csat/index.php](/code/files/tickets/csat/index.php.md) | L100, L121, L135, L155, L166, L184 ... |  |
| [tickets/csat/survey.php](/code/files/tickets/csat/survey.php.md) | L32 |  |

