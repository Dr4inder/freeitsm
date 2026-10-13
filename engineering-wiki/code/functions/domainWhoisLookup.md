# domainWhoisLookup()

```php
function domainWhoisLookup(PDO $conn, string $name): array
```

Defined in [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md), line 355.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$name` | `string` |  |  |

**Returns:** `array`

## Calls

[domainBlankResult()](/code/functions/domainBlankResult.md), [domainDateOnly()](/code/functions/domainDateOnly.md), [domainDeriveFlags()](/code/functions/domainDeriveFlags.md), [domainLooksRedacted()](/code/functions/domainLooksRedacted.md), [domainNormaliseStatuses()](/code/functions/domainNormaliseStatuses.md), [domainTld()](/code/functions/domainTld.md), [domainWhoisQuery()](/code/functions/domainWhoisQuery.md), [domainWhoisServer()](/code/functions/domainWhoisServer.md)

## Called from

- [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md) - in [domainLookup()](/code/functions/domainLookup.md)

