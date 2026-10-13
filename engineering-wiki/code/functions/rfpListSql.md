# rfpListSql()

The RFP LIST: the active company, or every company the analyst can see under "All companies".

```php
function rfpListSql(PDO $conn, int $analystId, string $r = 'r'): array
```

Defined in [includes/rfp_scope.php](/code/files/includes/rfp_scope.php.md), line 42.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$r` | `string` | `'r'` |  |

**Returns:** `array`

## Calls

[activeTenantReadFilter()](/code/functions/activeTenantReadFilter.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [rfpTenantReady()](/code/functions/rfpTenantReady.md)

## Called from

- [api/rfp-builder/get_rfps.php](/code/files/api/rfp-builder/get_rfps.php.md)

