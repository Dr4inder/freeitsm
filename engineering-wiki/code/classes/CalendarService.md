# CalendarService

> Class in [includes/services/calendar.php](/code/files/includes/services/calendar.php.md), line 29

## Methods

| Method | What it does |
|---|---|
| [saveEvent()](#saveevent) | Create (no id) or update (id present) an event. Returns ['id','created']. |
| [deleteEvent()](#deleteevent) | Delete an event. 404 if missing, 409 if generated. Returns the id. |
| [saveCategory()](#savecategory) | Create (no id) or update (id present) a category. Returns ['id','created']. |
| [deleteCategory()](#deletecategory) | Delete a category — refused (409) while events still use it. Returns the id. |
| [loadEventRow()](#loadeventrow) | Loads one calendar event; throws not found when it does not exist. |
| [guardGenerated()](#guardgenerated) | Generated rows belong to their sync — never edited/deleted through here. |
| [collectEventFields()](#collecteventfields) | Collect + validate the writable event fields (mirrors the API resource's apiCalendarEventFields). On update, absent keys fall back to the current row. Datetimes are naive server-local (Z/offset rejected). |
| [parseNaiveDatetime()](#parsenaivedatetime) | Parse a NAIVE local datetime ("YYYY-MM-DD HH:MM[:SS]", T separator OK, date-only OK). Throws on timezone designators — naive-local by design. (Throwing twin of the resource's apiParseNaiveDatetime.) |

### saveEvent

*public static* - line 36

Create (no id) or update (id present) an event. Returns ['id','created'].

```php
function saveEvent(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 57 | `CalendarService::saveEvent` | **update** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `location`, `contract_id`, `updated_at`) |  |
| 78 | `CalendarService::saveEvent` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `location`, `contract_id`, `created_by`) |  |

**Called from:** [api/calendar/save_event.php](/code/files/api/calendar/save_event.php.md), [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md)

### deleteEvent

*public static* - line 92

Delete an event. 404 if missing, 409 if generated. Returns the id.

```php
function deleteEvent(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 96 | `CalendarService::deleteEvent` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |

**Called from:** [api/calendar/delete_event.php](/code/files/api/calendar/delete_event.php.md), [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md)

### saveCategory

*public static* - line 106

Create (no id) or update (id present) a category. Returns ['id','created'].

```php
function saveCategory(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 122 | `CalendarService::saveCategory` | **update** [calendar_categories](/code/tables/calendar_categories.md) (`name`, `color`, `description`, `is_active`, `updated_at`) |  |
| 129 | `CalendarService::saveCategory` | **insert** [calendar_categories](/code/tables/calendar_categories.md) (`name`, `color`, `description`, `is_active`) |  |

**Called from:** [api/calendar/save_category.php](/code/files/api/calendar/save_category.php.md)

### deleteCategory

*public static* - line 137

Delete a category — refused (409) while events still use it. Returns the id.

```php
function deleteCategory(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 142 | `CalendarService::deleteCategory` | read [calendar_events](/code/tables/calendar_events.md) |  |
| 148 | `CalendarService::deleteCategory` | read [calendar_categories](/code/tables/calendar_categories.md) |  |
| 149 | `CalendarService::deleteCategory` | **delete** [calendar_categories](/code/tables/calendar_categories.md) |  |

**Called from:** [api/calendar/delete_category.php](/code/files/api/calendar/delete_category.php.md)

### loadEventRow

*private static* - line 163

Loads one calendar event; throws not found when it does not exist.

```php
function loadEventRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 165 | `CalendarService::loadEventRow` | read [calendar_events](/code/tables/calendar_events.md) |  |

### guardGenerated

*private static* - line 175

Generated rows belong to their sync — never edited/deleted through here.

```php
function guardGenerated(array $event): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `array` |  |  |

### collectEventFields

*private static* - line 187

Collect + validate the writable event fields (mirrors the API resource's apiCalendarEventFields). On update, absent keys fall back to the current row. Datetimes are naive server-local (Z/offset rejected).

```php
function collectEventFields(
    PDO $conn,
    array $in,
    array $current = [],
    ?ActorContext $ctx = null
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |
| `$current` | `array` | `[]` |  |
| `$ctx` | `?ActorContext` | `null` | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 213 | `CalendarService::collectEventFields` | read [calendar_categories](/code/tables/calendar_categories.md) |  |
| 226 | `CalendarService::collectEventFields` | read [contracts](/code/tables/contracts.md) |  |

### parseNaiveDatetime

*private static* - line 243

Parse a NAIVE local datetime ("YYYY-MM-DD HH:MM[:SS]", T separator OK, date-only OK). Throws on timezone designators — naive-local by design. (Throwing twin of the resource's apiParseNaiveDatetime.)

```php
function parseNaiveDatetime($value, string $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

