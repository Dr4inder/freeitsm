# api/tickets/get_ticket_widget_data.php

> API endpoint - 615 lines

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
| [isTimeBased()](/code/functions/isTimeBased.md) | 140 | Whether a widget property is plotted over time ('created' or 'closed') rather than counted by category. |
| [isCreatedVsClosed()](/code/functions/isCreatedVsClosed.md) | 145 | Whether a widget property is the two-series created-versus-closed chart. |
| [getDateField()](/code/functions/getDateField.md) | 153 | The tickets date column a time-based property counts by - closed_datetime for 'closed', created_datetime otherwise. |
| [buildDateRangeWhere()](/code/functions/buildDateRangeWhere.md) | 164 | Turns a widget's date range ('7d', '30d', 'this_month', '3m', '6m', '12m', 'this_year') into a condition on the date column and its start date. |
| [buildDepartmentWhere()](/code/functions/buildDepartmentWhere.md) | 188 | Turns a widget's department filter into a t.department_id IN (...) condition with its integer parameters - ['', []] when there is no filter. |
| [getDateExpr()](/code/functions/getDateExpr.md) | 197 | The SQL expression that buckets a ticket date by day, month or year for GROUP BY. |
| [getTimeLabels()](/code/functions/getTimeLabels.md) | 211 | Every bucket key (day, month or year) from the start of the date range to today, so a time chart shows empty periods as zero instead of leaving them out. An unknown range means the last 12 months. |
| [formatLabel()](/code/functions/formatLabel.md) | 257 | Turns a bucket key into the axis label in the analyst's date format - day and month buckets are rendered without a time-zone shift, years as they are. |
| [getCategoricalData()](/code/functions/getCategoricalData.md) | 276 | Counts tickets by one property (status, priority, department, type, category, closure category, resolution code, analyst, owner, origin, first-time fix, training provided), largest first. |
| [getCategoricalWithSeries()](/code/functions/getCategoricalWithSeries.md) | 348 | Counts tickets by one property, split into a series per status or priority - the stacked or grouped bar chart. |
| [getTimeData()](/code/functions/getTimeData.md) | 404 | Counts tickets created or closed per day, month or year across the date range, with every empty period filled in as zero. |
| [getTimeWithSeries()](/code/functions/getTimeWithSeries.md) | 454 | Counts tickets created or closed per period across the date range, split into a series per status or priority, with empty periods filled in as zero. |
| [getCreatedVsClosedData()](/code/functions/getCreatedVsClosedData.md) | 522 | Counts tickets created and tickets closed in each period of the date range, as two series on the same time labels. |
| [pivotToSeries()](/code/functions/pivotToSeries.md) | 589 | Pivots label / series_val / value rows into chart series - one series per distinct series value, with a count (0 when missing) for every label. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 33 |  | read [ticket_dashboard_widgets](/code/tables/ticket_dashboard_widgets.md) |  |
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
| 351 | `getCategoricalWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 355 | `getCategoricalWithSeries` | read [departments](/code/tables/departments.md) |  |
| 358 | `getCategoricalWithSeries` | read [ticket_types](/code/tables/ticket_types.md) |  |
| 361 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 364 | `getCategoricalWithSeries` | read [analysts](/code/tables/analysts.md) |  |
| 367 | `getCategoricalWithSeries` | read [ticket_origins](/code/tables/ticket_origins.md) |  |
| 372 | `getCategoricalWithSeries` | read [ticket_categories](/code/tables/ticket_categories.md) |  |
| 377 | `getCategoricalWithSeries` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |
| 386 | `getCategoricalWithSeries` | read [tickets](/code/tables/tickets.md) |  |
| 424 | `getTimeData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 425 | `getTimeData` | read [tickets](/code/tables/tickets.md) |  |
| 458 | `getTimeWithSeries` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 475 | `getTimeWithSeries` | read [tickets](/code/tables/tickets.md) |  |
| 536 | `getCreatedVsClosedData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 537 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |
| 553 | `getCreatedVsClosedData` | read [tickets](/code/tables/tickets.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [ticketTenantFilter()](/code/functions/ticketTenantFilter.md)

