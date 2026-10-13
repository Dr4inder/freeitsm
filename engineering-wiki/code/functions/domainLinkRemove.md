# domainLinkRemove()

```php
function domainLinkRemove(
    PDO $conn,
    int $analystId,
    int $domainId,
    string $kind,
    int $targetId
): bool
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 196.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$domainId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$targetId` | `int` |  |  |

**Returns:** `bool`

## Calls

[domainLinkDomainTenant()](/code/functions/domainLinkDomainTenant.md), [domainLinkKind()](/code/functions/domainLinkKind.md), [domainLinkKindAllowed()](/code/functions/domainLinkKindAllowed.md), [domainLinksReady()](/code/functions/domainLinksReady.md), [domainLinkTargetOk()](/code/functions/domainLinkTargetOk.md)

## Called from

- [api/domains/links.php](/code/files/api/domains/links.php.md)

