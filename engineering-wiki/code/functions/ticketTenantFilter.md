# ticketTenantFilter()

```php
function ticketTenantFilter(
    PDO $conn,
    int $analystId,
    string $alias = 't',
    bool $forceSingle = false
): array
```

Defined in [includes/tenancy.php](/code/files/includes/tenancy.php.md), line 710.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$alias` | `string` | `'t'` |  |
| `$forceSingle` | `bool` | `false` | ignore the consolidated view and scope to the ONE active company. For destructive endpoints — see the note in api/tickets/empty_trash.php. Reading wider is the point of the combined board; DELETING wider is not. |

**Returns:** `array`

## Calls

[allAccessibleTenantsFilter()](/code/functions/allAccessibleTenantsFilter.md), [getActiveTenantId()](/code/functions/getActiveTenantId.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isActiveTenantAll()](/code/functions/isActiveTenantAll.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/assets/get_asset_tickets.php](/code/files/api/assets/get_asset_tickets.php.md)
- [api/cmdb/get_object_tickets.php](/code/files/api/cmdb/get_object_tickets.php.md)
- [api/problem-management/ai_suggest_problem.php](/code/files/api/problem-management/ai_suggest_problem.php.md)
- [api/problem-management/list.php](/code/files/api/problem-management/list.php.md)
- [api/system/global_search.php](/code/files/api/system/global_search.php.md)
- [api/tasks/search_links.php](/code/files/api/tasks/search_links.php.md)
- [api/tickets/empty_trash.php](/code/files/api/tickets/empty_trash.php.md)
- [api/tickets/get_emails.php](/code/files/api/tickets/get_emails.php.md)
- [api/tickets/get_inbox_activity.php](/code/files/api/tickets/get_inbox_activity.php.md)
- [api/tickets/get_scheduled_tickets.php](/code/files/api/tickets/get_scheduled_tickets.php.md)
- [api/tickets/get_ticket_counts.php](/code/files/api/tickets/get_ticket_counts.php.md)
- [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md)
- [api/tickets/get_user_tickets.php](/code/files/api/tickets/get_user_tickets.php.md)
- [api/tickets/get_users.php](/code/files/api/tickets/get_users.php.md)
- [api/tickets/search_tickets.php](/code/files/api/tickets/search_tickets.php.md)
- [includes/documents.php](/code/files/includes/documents.php.md) - in [documentEntityRegistry()](/code/functions/documentEntityRegistry.md)
- [tickets/csat/index.php](/code/files/tickets/csat/index.php.md)

