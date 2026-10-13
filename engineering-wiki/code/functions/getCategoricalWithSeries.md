# getCategoricalWithSeries()

Counts tickets by one property, split into a series per status or priority - the stacked or grouped bar chart.

```php
function getCategoricalWithSeries($conn, $prop, $seriesProp, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 348.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$prop` |  |  |  |
| `$seriesProp` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

**Returns:** array  {labels, series} from `pivotToSeries()`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 351 | `getCategoricalWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 355 | `getCategoricalWithSeries` | read [departments](/code/tables/departments.md) |  |
| 358 | `getCategoricalWithSeries` | read [ticket_types](/code/tables/ticket_types.md) |  |
| 361 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 364 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 367 | `getCategoricalWithSeries` | read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 372 | `getCategoricalWithSeries` | read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 377 | `getCategoricalWithSeries` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 386 | `getCategoricalWithSeries` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[pivotToSeries()](/code/functions/pivotToSeries.md)

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

