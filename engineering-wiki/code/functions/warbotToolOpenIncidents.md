# warbotToolOpenIncidents()

open_incidents: the count of open tickets (optionally at one priority by name) and the newest few, by number, priority, status, subject and assignee. A confidential ticket's subject is withheld by `ticketAiSubjectSql()`.

```php
function warbotToolOpenIncidents(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 390.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 403 | `warbotToolOpenIncidents` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [analysts](/code/tables/analysts.md) |  |
| 415 | `warbotToolOpenIncidents` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |

## Calls

[ticketAiSubjectSql()](/code/functions/ticketAiSubjectSql.md)

*Nothing calls this function by name.*

