# domainWhoisQuery()

One port-43 query. null when the server could not be reached.

```php
function domainWhoisQuery(string $server, string $query): ?string
```

Defined in [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md), line 338.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$server` | `string` |  |  |
| `$query` | `string` |  |  |

**Returns:** `?string`

## Called from

- [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md) - in [domainWhoisServer()](/code/functions/domainWhoisServer.md), [domainWhoisLookup()](/code/functions/domainWhoisLookup.md)

