# getTimeWithSeries()

```php
function getTimeWithSeries($conn, $prop, $seriesProp, $timeGrouping, $dateRange, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 400.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$prop` |  |  |  |
| `$seriesProp` |  |  |  |
| `$timeGrouping` |  |  |  |
| `$dateRange` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 404 | `getTimeWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 421 | `getTimeWithSeries` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[buildDateRangeWhere()](/code/functions/buildDateRangeWhere.md), [formatLabel()](/code/functions/formatLabel.md), [getDateExpr()](/code/functions/getDateExpr.md), [getDateField()](/code/functions/getDateField.md), [getTimeLabels()](/code/functions/getTimeLabels.md)

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

