# domainLinkDomainTenant()

The domain's company (Default for NULL), or a not-found for a domain out of reach.

```php
function domainLinkDomainTenant(PDO $conn, int $analystId, int $domainId): int
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 121.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$domainId` | `int` |  |  |

**Returns:** `int`

## Calls

[analystCanAccessDomain()](/code/functions/analystCanAccessDomain.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [domainLinkTenantOf()](/code/functions/domainLinkTenantOf.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinks()](/code/functions/domainLinks.md), [domainLinkAdd()](/code/functions/domainLinkAdd.md), [domainLinkRemove()](/code/functions/domainLinkRemove.md), [domainLinkSearch()](/code/functions/domainLinkSearch.md)

