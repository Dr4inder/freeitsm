# api/tickets/get_ticket_widget_data.php

> API endpoint - 549 lines

API Endpoint: Get aggregated data for a ticket dashboard widget Params: widget_id (required), status (optional filter value) Returns: {labels, values} for single-series or {labels, series} for multi-series

## The endpoint

| | |
|---|---|
| URL | `api/tickets/get_ticket_widget_data.php` |
| Protected by | Module access: tickets (requireModuleAccessJson) |
| Reads | `GET widget_id`, `GET status` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [isTimeBased()](/code/functions/isTimeBased.md) | 136 |  |
| [isCreatedVsClosed()](/code/functions/isCreatedVsClosed.md) | 140 |  |
| [getDateField()](/code/functions/getDateField.md) | 144 |  |
| [buildDateRangeWhere()](/code/functions/buildDateRangeWhere.md) | 149 |  |
| [buildDepartmentWhere()](/code/functions/buildDepartmentWhere.md) | 169 |  |
| [getDateExpr()](/code/functions/getDateExpr.md) | 177 |  |
| [getTimeLabels()](/code/functions/getTimeLabels.md) | 186 |  |
| [formatLabel()](/code/functions/formatLabel.md) | 228 |  |
| [getCategoricalData()](/code/functions/getCategoricalData.md) | 240 |  |
| [getCategoricalWithSeries()](/code/functions/getCategoricalWithSeries.md) | 306 |  |
| [getTimeData()](/code/functions/getTimeData.md) | 356 |  |
| [getTimeWithSeries()](/code/functions/getTimeWithSeries.md) | 400 |  |
| [getCreatedVsClosedData()](/code/functions/getCreatedVsClosedData.md) | 462 |  |
| [pivotToSeries()](/code/functions/pivotToSeries.md) | 523 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 33 |  | read [ticket_dashboard_widgets](/code/tables/ticket_dashboard_widgets.md) |  |
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
| 309 | `getCategoricalWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 313 | `getCategoricalWithSeries` | read [departments](/code/tables/departments.md) |  |
| 316 | `getCategoricalWithSeries` | read [ticket_types](/code/tables/ticket_types.md) |  |
| 319 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 322 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 325 | `getCategoricalWithSeries` | read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 330 | `getCategoricalWithSeries` | read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 335 | `getCategoricalWithSeries` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 344 | `getCategoricalWithSeries` | read [tickets](/code/tables/tickets.md) |  |
| 376 | `getTimeData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 377 | `getTimeData` | read [tickets](/code/tables/tickets.md) |  |
| 404 | `getTimeWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 421 | `getTimeWithSeries` | read [tickets](/code/tables/tickets.md) |  |
| 476 | `getCreatedVsClosedData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 477 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |
| 493 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [ticketTenantFilter()](/code/functions/ticketTenantFilter.md)

