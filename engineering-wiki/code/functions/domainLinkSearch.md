# domainLinkSearch()

Records of one kind that could be linked to a domain: matching `$q`, in the domain's company, visible to the analyst, not already linked. At most 20.

```php
function domainLinkSearch(PDO $conn, int $analystId, int $domainId, string $kind, string $q): array
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 215.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$domainId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$q` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 227 | `domainLinkSearch` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 232 | `domainLinkSearch` | read [tickets](/code/tables/tickets.md) |  |
| 237 | `domainLinkSearch` | read [status_services](/code/tables/status_services.md) |  |
| 243 | `domainLinkSearch` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[domainLinkDescribe()](/code/functions/domainLinkDescribe.md), [domainLinkDomainTenant()](/code/functions/domainLinkDomainTenant.md), [domainLinkKind()](/code/functions/domainLinkKind.md), [domainLinkKindAllowed()](/code/functions/domainLinkKindAllowed.md), [domainLinksReady()](/code/functions/domainLinksReady.md), [domainLinkTargetOk()](/code/functions/domainLinkTargetOk.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md)

## Called from

- [api/domains/links.php](/code/files/api/domains/links.php.md)

