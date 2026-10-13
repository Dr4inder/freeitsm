# rpTenantLabel()

The company's name for the header field {{company}}.

```php
function rpTenantLabel(PDO $conn, int $analystId, $tenant): string
```

Defined in [includes/report_packs/criteria.php](/code/files/includes/report_packs/criteria.php.md), line 130.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$tenant` |  |  |  |

**Returns:** `string`

## Calls

[getActiveTenantId()](/code/functions/getActiveTenantId.md), [getAllTenants()](/code/functions/getAllTenants.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/reporting/packs/context.php](/code/files/api/reporting/packs/context.php.md)

