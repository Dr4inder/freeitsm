# ticketChecklistClosureMode()

'warn' (default) or 'block' — how closure with outstanding mandatory steps behaves.

```php
function ticketChecklistClosureMode(PDO $conn, ?int $tenantId): string
```

Defined in [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md), line 200.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Returns:** `string`

## Calls

[tenantSetting()](/code/functions/tenantSetting.md)

## Called from

- [api/tickets/save_checklist_settings.php](/code/files/api/tickets/save_checklist_settings.php.md)
- [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) - in `ChecklistsService::effectiveClosureMode`
- [tickets/settings/index.php](/code/files/tickets/settings/index.php.md)

