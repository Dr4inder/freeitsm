# apiDomainsLookup()

POST /domains/{id}/lookup — ask the registry now

```php
function apiDomainsLookup(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 298.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadDomain()](/code/functions/apiLoadDomain.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeDomain()](/code/functions/apiSerializeDomain.md)

*Nothing calls this function by name.*

