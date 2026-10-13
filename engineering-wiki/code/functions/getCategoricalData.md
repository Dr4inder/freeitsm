# getCategoricalData()

```php
function getCategoricalData($conn, $prop, $where, $params)
```

Defined in [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md), line 240.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$prop` |  |  |  |
| `$where` |  |  |  |
| `$params` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 241 | `getCategoricalData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 243 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 245 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 247 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [departments](/code/tables/departments.md) |  |
| 249 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_types](/code/tables/ticket_types.md) |  |
| 272 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 281 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 283 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [analysts](/code/tables/analysts.md) |  |
| 285 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [analysts](/code/tables/analysts.md) |  |
| 287 | `getCategoricalData` | read [tickets](/code/tables/tickets.md), read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 289 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |
| 291 | `getCategoricalData` | read [tickets](/code/tables/tickets.md) |  |

## Called from

- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)

