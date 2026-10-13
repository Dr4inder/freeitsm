# filesHasCap()

True when the analyst holds the capability; a failed lookup counts as no.

```php
function filesHasCap(PDO $conn, int $analystId, string $cap): bool
```

Defined in [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$cap` | `string` |  |  |

**Returns:** `bool`

## Calls

[analystHasCapability()](/code/functions/analystHasCapability.md)

## Called from

- [api/files/folder.php](/code/files/api/files/folder.php.md)
- [api/files/list.php](/code/files/api/files/list.php.md)
- [api/files/permissions.php](/code/files/api/files/permissions.php.md)
- [api/files/transfer.php](/code/files/api/files/transfer.php.md)

