# getCategoricalData()

Counts tickets by one property (status, priority, department, type, category, closure category, resolution code, analyst, owner, origin, first-time fix, training provided), largest first.

```php
function getCategoricalData($conn, $prop, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 276.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$prop` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

**Returns:** array  {labels, values} - empty for a property it does not know

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 277 | `getCategoricalData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 279 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 281 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 283 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [departments](/code/tables/departments.md) |  |
| 285 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_types](/code/tables/ticket_types.md) |  |
| 308 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 317 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 319 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [analysts](/code/tables/analysts.md) |  |
| 321 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [analysts](/code/tables/analysts.md) |  |
| 323 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 325 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 327 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

