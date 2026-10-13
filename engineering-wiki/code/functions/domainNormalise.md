# domainNormalise()

```php
function domainNormalise(string $raw): array
```

Defined in [includes/domains/names.php](/code/files/includes/domains/names.php.md), line 19.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

**Returns:** array{ok:bool, name?:string, display?:?string, error?:string}

## Called from

- [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md)
- [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) - in [apiDomainsList()](/code/functions/apiDomainsList.md)
- [includes/services/domains.php](/code/files/includes/services/domains.php.md) - in `DomainsService::createDomain`, `DomainsService::updateDomain`, `DomainsService::bulkAdd`

