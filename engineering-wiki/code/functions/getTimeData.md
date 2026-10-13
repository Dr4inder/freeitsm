# getTimeData()

Counts tickets created or closed per day, month or year across the date range, with every empty period filled in as zero.

```php
function getTimeData($conn, $prop, $timeGrouping, $dateRange, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 404.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$prop` |  |  |  |
| `$timeGrouping` |  |  |  |
| `$dateRange` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

**Returns:** array  {labels, values}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 424 | `getTimeData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 425 | `getTimeData` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[buildDateRangeWhere()](/code/functions/buildDateRangeWhere.md), [formatLabel()](/code/functions/formatLabel.md), [getDateExpr()](/code/functions/getDateExpr.md), [getDateField()](/code/functions/getDateField.md), [getTimeLabels()](/code/functions/getTimeLabels.md)

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

