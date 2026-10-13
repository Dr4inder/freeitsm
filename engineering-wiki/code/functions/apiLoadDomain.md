# apiLoadDomain()

The by-id gate: existence + company scope, both failing as 404.

```php
function apiLoadDomain(PDO $conn, array $apiKey, int $id): array
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 132.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$id` | `int` |  |  |

**Returns:** `array`

## Calls

[apiDomainSelect()](/code/functions/apiDomainSelect.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) - in [apiDomainsGet()](/code/functions/apiDomainsGet.md), [apiDomainsCreate()](/code/functions/apiDomainsCreate.md), [apiDomainsUpdate()](/code/functions/apiDomainsUpdate.md), [apiDomainsDelete()](/code/functions/apiDomainsDelete.md), [apiDomainsLookup()](/code/functions/apiDomainsLookup.md), [apiDomainsCheck()](/code/functions/apiDomainsCheck.md), [apiDomainsFindings()](/code/functions/apiDomainsFindings.md), [apiDomainsHistory()](/code/functions/apiDomainsHistory.md)

