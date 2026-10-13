# apiSuppliersGet()

```php
function apiSuppliersGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 397.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 400 | `apiSuppliersGet` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeSupplier()](/code/functions/apiSerializeSupplier.md)

*Nothing calls this function by name.*

