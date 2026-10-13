# apiSupplierContactsDelete()

```php
function apiSupplierContactsDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 514.

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
| 517 | `apiSupplierContactsDelete` | **delete** [contacts](/code/tables/contacts.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

