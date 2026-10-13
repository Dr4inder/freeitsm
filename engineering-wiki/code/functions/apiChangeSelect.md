# apiChangeSelect()

```php
function apiChangeSelect(): string
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 47.

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `apiChangeSelect` | read [changes](/code/tables/changes.md), read [change_types](/code/tables/change_types.md), read [change_statuses](/code/tables/change_statuses.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md), read [change_categories](/code/tables/change_categories.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |

## Called from

- [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md) - in [apiLoadChange()](/code/functions/apiLoadChange.md), [apiChangesList()](/code/functions/apiChangesList.md)

