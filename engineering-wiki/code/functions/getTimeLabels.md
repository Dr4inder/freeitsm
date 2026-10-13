# getTimeLabels()

Every bucket key (day, month or year) from the start of the date range to today, so a time chart shows empty periods as zero instead of leaving them out. An unknown range means the last 12 months.

```php
function getTimeLabels($dateRange, $timeGrouping)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 211.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dateRange` |  |  |  |
| `$timeGrouping` |  |  |  |

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md) - in [getTimeData()](/code/functions/getTimeData.md), [getTimeWithSeries()](/code/functions/getTimeWithSeries.md), [getCreatedVsClosedData()](/code/functions/getCreatedVsClosedData.md)

