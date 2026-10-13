# domainLinkPickDomains()

The picker on the OTHER side: domains that could be linked to this CI / service / ticket / article - visible, matching `$q`, not already linked, and for a company record in that record's company. At most 20.

```php
function domainLinkPickDomains(
    PDO $conn,
    int $analystId,
    string $kind,
    int $targetId,
    string $q
): array
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 280.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$targetId` | `int` |  |  |
| `$q` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 286 | `domainLinkPickDomains` | read [domains](/code/tables/domains.md) |  |

## Calls

[analystCanAccessDomain()](/code/functions/analystCanAccessDomain.md), [domainLinkDomainRows()](/code/functions/domainLinkDomainRows.md), [domainLinkKindAllowed()](/code/functions/domainLinkKindAllowed.md), [domainLinkKinds()](/code/functions/domainLinkKinds.md), [domainLinksReady()](/code/functions/domainLinksReady.md), [domainLinkTargetOk()](/code/functions/domainLinkTargetOk.md), [domainLinkTenantOf()](/code/functions/domainLinkTenantOf.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/domains/links.php](/code/files/api/domains/links.php.md)

