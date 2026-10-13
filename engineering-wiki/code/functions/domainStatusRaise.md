# domainStatusRaise()

Raise one incident for a domain's trouble on its linked services, and record it against every current problem. Returns the incident id, or the open one it already raised. Throws ServiceError when there is nothing to raise (no trouble, or no services linked).

```php
function domainStatusRaise(PDO $conn, ActorContext $ctx, int $domainId): int
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 154.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$domainId` | `int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 175 | `domainStatusRaise` | **insert** [domain_status_incidents](/code/tables/domain_status_incidents.md) (`domain_id`, `incident_id`, `trigger_kind`, `fingerprint`) |  |

## Calls

[domainSettings()](/code/functions/domainSettings.md), [domainStatusImpactId()](/code/functions/domainStatusImpactId.md), [domainStatusOpenIncident()](/code/functions/domainStatusOpenIncident.md), [domainStatusProblems()](/code/functions/domainStatusProblems.md), [domainStatusReady()](/code/functions/domainStatusReady.md), [domainStatusRow()](/code/functions/domainStatusRow.md), [domainStatusServiceIds()](/code/functions/domainStatusServiceIds.md), [domainStatusWording()](/code/functions/domainStatusWording.md)

## Called from

- [api/domains/links.php](/code/files/api/domains/links.php.md)
- [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) - in [domainStatusRun()](/code/functions/domainStatusRun.md)

