# getCategoricalWithSeries()

```php
function getCategoricalWithSeries($conn, $prop, $seriesProp, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 306.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$prop` |  |  |  |
| `$seriesProp` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 309 | `getCategoricalWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 313 | `getCategoricalWithSeries` | read [departments](/code/tables/departments.md) |  |
| 316 | `getCategoricalWithSeries` | read [ticket_types](/code/tables/ticket_types.md) |  |
| 319 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 322 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 325 | `getCategoricalWithSeries` | read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 330 | `getCategoricalWithSeries` | read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 335 | `getCategoricalWithSeries` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 344 | `getCategoricalWithSeries` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[pivotToSeries()](/code/functions/pivotToSeries.md)

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

