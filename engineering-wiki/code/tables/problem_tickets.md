# problem_tickets

The incident link: which tickets a problem explains. UNIQUE(problem_id,ticket_id).

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `problem_id` | `INT NOT NULL` |  |
| `ticket_id` | `INT NOT NULL` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/problems.php](/code/files/includes/services/problems.php.md):298 | `ProblemsService::linkTicket` | insert | `problem_id`, `ticket_id`, `created_by_id`, `created_datetime` |  |
| [includes/services/problems.php](/code/files/includes/services/problems.php.md):310 | `ProblemsService::unlinkTicket` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/problem-management/ai_root_cause.php](/code/files/api/problem-management/ai_root_cause.php.md) | L35 |  |
| [api/problem-management/get.php](/code/files/api/problem-management/get.php.md) | L37 |  |
| [api/problem-management/list.php](/code/files/api/problem-management/list.php.md) | L28 |  |
| [api/problem-management/list_linkable_tickets.php](/code/files/api/problem-management/list_linkable_tickets.php.md) | L41 |  |
| [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md) | L204 |  |
| [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md) | apiProblemSelect L41, apiProblemsGet L212 |  |
| [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) | gapBulkRichness L384 |  |
| [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md) | writeupTicketBundle L277 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewProblem L256 |  |
| [includes/services/problems.php](/code/files/includes/services/problems.php.md) | ProblemsService::linkTicket L292 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolKnownErrors L632 |  |

