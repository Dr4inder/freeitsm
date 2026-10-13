# apiSupplierContactsList()

GET /suppliers/{id}/contacts - the supplier's contacts, by surname.

```php
function apiSupplierContactsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 475.

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
| 478 | `apiSupplierContactsList` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

