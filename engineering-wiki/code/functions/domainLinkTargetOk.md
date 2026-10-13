# domainLinkTargetOk()

Is the OTHER end of a link one this analyst may see, and (for company records) in the domain's company? `$domainTenant` null = do not compare.

```php
function domainLinkTargetOk(
    PDO $conn,
    int $analystId,
    string $kind,
    int $targetId,
    ?int $domainTenant
): bool
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 95.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$targetId` | `int` |  |  |
| `$domainTenant` | `?int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 105 | `domainLinkTargetOk` | read [tickets](/code/tables/tickets.md) |  |
| 110 | `domainLinkTargetOk` | read [status_services](/code/tables/status_services.md) |  |

## Calls

[analystCanAccessCmdbObject()](/code/functions/analystCanAccessCmdbObject.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [domainLinkTenantOf()](/code/functions/domainLinkTenantOf.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [knowledgeCanRead()](/code/functions/knowledgeCanRead.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinks()](/code/functions/domainLinks.md), [domainLinkAdd()](/code/functions/domainLinkAdd.md), [domainLinkRemove()](/code/functions/domainLinkRemove.md), [domainLinkSearch()](/code/functions/domainLinkSearch.md), [domainsLinkedTo()](/code/functions/domainsLinkedTo.md), [domainLinkPickDomains()](/code/functions/domainLinkPickDomains.md)

