# domainLinkKindAllowed()

May this analyst use links of this kind at all? (Domains AND the other module.)

```php
function domainLinkKindAllowed(PDO $conn, int $analystId, string $kind): bool
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 70.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$kind` | `string` |  |  |

**Returns:** `bool`

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [domainLinkKinds()](/code/functions/domainLinkKinds.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinks()](/code/functions/domainLinks.md), [domainLinkAdd()](/code/functions/domainLinkAdd.md), [domainLinkRemove()](/code/functions/domainLinkRemove.md), [domainLinkSearch()](/code/functions/domainLinkSearch.md), [domainsLinkedTo()](/code/functions/domainsLinkedTo.md), [domainLinkPickDomains()](/code/functions/domainLinkPickDomains.md)

