# cmdbAuditStale()

Nothing has touched this object in CMDB_AUDIT_STALE_MONTHS.

```php
function cmdbAuditStale(PDO $conn, int $analystId): array
```

Defined in [includes/cmdb_audit.php](/code/files/includes/cmdb_audit.php.md), line 197.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 199 | `cmdbAuditStale` | read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md) |  |

## Calls

[activeTenantFilter()](/code/functions/activeTenantFilter.md), [cmdbAuditResult()](/code/functions/cmdbAuditResult.md), [cmdbAuditRows()](/code/functions/cmdbAuditRows.md)

## Called from

- [includes/cmdb_audit.php](/code/files/includes/cmdb_audit.php.md) - in [cmdbRunAudit()](/code/functions/cmdbRunAudit.md)

