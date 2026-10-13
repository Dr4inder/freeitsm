# domainLinkKind()

Returns the definition (table, column, module...) of one link kind; throws a validation ServiceError for an unknown kind.

```php
function domainLinkKind(string $kind): array
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 65.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$kind` | `string` |  |  |

**Returns:** `array`

## Calls

[domainLinkKinds()](/code/functions/domainLinkKinds.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinkAdd()](/code/functions/domainLinkAdd.md), [domainLinkRemove()](/code/functions/domainLinkRemove.md), [domainLinkSearch()](/code/functions/domainLinkSearch.md)

