# includes/report_packs/blocks_tickets.php

> PHP - 270 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpTicketWhere()](/code/functions/rpTicketWhere.md) | 41 | WHERE for "tickets in this period, for this company, not trashed". |
| [rpTicketsBreakdown()](/code/functions/rpTicketsBreakdown.md) | 59 |  |
| [rpChartFromRows()](/code/functions/rpChartFromRows.md) | 78 | Turn [label, value, colour?] rows into chart data, folding everything past `limit` into one "Other" slice so a pie never has fifty slivers. |
| [rpTimeBuckets()](/code/functions/rpTimeBuckets.md) | 106 | Buckets for a time series over the range: day, week (Monday) or month, chosen from the range's length when 'auto'. Returned as local-date keys with labels. |
| [rpBucketKey()](/code/functions/rpBucketKey.md) | 125 |  |
| [rpBucketCount()](/code/functions/rpBucketCount.md) | 133 | Count UTC timestamps into local buckets. |
| [rpTicketsTrend()](/code/functions/rpTicketsTrend.md) | 145 |  |
| [rpTicketsKpis()](/code/functions/rpTicketsKpis.md) | 165 |  |
| [rpTicketsList()](/code/functions/rpTicketsList.md) | 195 |  |
| [rpFmtDateTime()](/code/functions/rpFmtDateTime.md) | 247 |  |
| [rpFmtDate()](/code/functions/rpFmtDate.md) | 253 | A LOCAL Y-m-d (already in the viewer's zone) in their date format. |
| [rpHumanDuration()](/code/functions/rpHumanDuration.md) | 260 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 23 |  | read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 26 |  | read [departments](/code/tables/departments.md) |  |
| 27 |  | read [ticket_types](/code/tables/ticket_types.md) |  |
| 28 |  | read [analysts](/code/tables/analysts.md) |  |
| 29 |  | read [teams](/code/tables/teams.md) |  |
| 30 |  | read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 31 |  | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 35 |  | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 64 | `rpTicketsBreakdown` | read [tickets](/code/tables/tickets.md) |  |
| 155 | `rpTicketsTrend` | read [tickets](/code/tables/tickets.md) |  |
| 169 | `rpTicketsKpis` | read [tickets](/code/tables/tickets.md) |  |
| 178 | `rpTicketsKpis` | read [tickets](/code/tables/tickets.md) |  |
| 198 | `rpTicketsList` | read [tickets](/code/tables/tickets.md) |  |
| 202 | `rpTicketsList` | read [analysts](/code/tables/analysts.md), read [ticket_categories](/code/tables/ticket_categories.md) |  |

## How it hangs together

**Included by:** [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md)

**Calls:** [fmt_datetime()](/code/functions/fmt_datetime.md), [rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

