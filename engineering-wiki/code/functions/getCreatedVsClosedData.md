# getCreatedVsClosedData()

Counts tickets created and tickets closed in each period of the date range, as two series on the same time labels.

```php
function getCreatedVsClosedData($conn, $timeGrouping, $dateRange, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 522.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$timeGrouping` |  |  |  |
| `$dateRange` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

**Returns:** array  {labels, series: [Created, Closed]}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 536 | `getCreatedVsClosedData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 537 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |
| 553 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[buildDateRangeWhere()](/code/functions/buildDateRangeWhere.md), [formatLabel()](/code/functions/formatLabel.md), [getDateExpr()](/code/functions/getDateExpr.md), [getTimeLabels()](/code/functions/getTimeLabels.md)

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

