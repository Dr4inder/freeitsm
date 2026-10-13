# domainLinkTenantOf()

A record's company with NULL read as the Default company.

```php
function domainLinkTenantOf(PDO $conn, string $table, int $id): ?int
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 82.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$id` | `int` |  |  |

**Returns:** `?int`

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinkTargetOk()](/code/functions/domainLinkTargetOk.md), [domainLinkDomainTenant()](/code/functions/domainLinkDomainTenant.md), [domainLinkPickDomains()](/code/functions/domainLinkPickDomains.md)

