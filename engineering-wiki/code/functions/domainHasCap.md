# domainHasCap()

True when the analyst holds the capability; false on any error.

```php
function domainHasCap(PDO $conn, int $analystId, string $cap): bool
```

Defined in [includes/domains/api_bootstrap.php](/code/files/includes/domains/api_bootstrap.php.md), line 65.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$cap` | `string` |  |  |

**Returns:** `bool`

## Calls

[analystHasCapability()](/code/functions/analystHasCapability.md)

## Called from

- [api/domains/get.php](/code/files/api/domains/get.php.md)
- [api/domains/save.php](/code/files/api/domains/save.php.md)
- [api/domains/settings.php](/code/files/api/domains/settings.php.md)

