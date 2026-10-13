# cmdbAuditResult()

Shape every check returns, so the UI can render them uniformly.

```php
function cmdbAuditResult(string $key, string $severity, int $count, array $items): array
```

Defined in [includes/cmdb_audit.php](/code/files/includes/cmdb_audit.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$severity` | `string` |  |  |
| `$count` | `int` |  |  |
| `$items` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/cmdb_audit.php](/code/files/includes/cmdb_audit.php.md) - in [cmdbAuditRequiredMissing()](/code/functions/cmdbAuditRequiredMissing.md), [cmdbAuditBrokenReferences()](/code/functions/cmdbAuditBrokenReferences.md), [cmdbAuditDependencyBlank()](/code/functions/cmdbAuditDependencyBlank.md), [cmdbAuditDisconnected()](/code/functions/cmdbAuditDisconnected.md), [cmdbAuditStale()](/code/functions/cmdbAuditStale.md), [cmdbAuditNoImpactEdges()](/code/functions/cmdbAuditNoImpactEdges.md)

