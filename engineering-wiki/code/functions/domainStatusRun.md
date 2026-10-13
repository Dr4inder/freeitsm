# domainStatusRun()

The scheduled part: raise (mode auto) and resolve (domain_status_auto_resolve). The actor is the system - actorId 0, which ServiceStatusService stores as the creator rather than inventing a member of staff.

```php
function domainStatusRun(PDO $conn): array
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 219.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 227 | `domainStatusRun` | read [domain_status_services](/code/tables/domain_status_services.md) |  |
| 236 | `domainStatusRun` | read [domain_status_incidents](/code/tables/domain_status_incidents.md) |  |
| 246 | `domainStatusRun` | read [domain_status_incidents](/code/tables/domain_status_incidents.md) |  |
| 250 | `domainStatusRun` | read [domain_status_incidents](/code/tables/domain_status_incidents.md) |  |
| 255 | `domainStatusRun` | read [status_incidents](/code/tables/status_incidents.md) |  |
| 266 | `domainStatusRun` | **update** [domain_status_incidents](/code/tables/domain_status_incidents.md) (`resolved_datetime`) |  |

## Calls

[domainSettings()](/code/functions/domainSettings.md), [domainStatusOpenIncident()](/code/functions/domainStatusOpenIncident.md), [domainStatusProblems()](/code/functions/domainStatusProblems.md), [domainStatusRaise()](/code/functions/domainStatusRaise.md), [domainStatusReady()](/code/functions/domainStatusReady.md), [domainStatusResolvedName()](/code/functions/domainStatusResolvedName.md), [domainStatusRow()](/code/functions/domainStatusRow.md)

## Called from

- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainScheduledRun()](/code/functions/domainScheduledRun.md)

