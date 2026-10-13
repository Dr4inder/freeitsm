# apiSupplierContactsCreate()

```php
function apiSupplierContactsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 457.

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
| 469 | `apiSupplierContactsCreate` | **insert** [contacts](/code/tables/contacts.md) (`supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`, `created_datetime`) |  |
| 477 | `apiSupplierContactsCreate` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeContact()](/code/functions/apiSerializeContact.md)

*Nothing calls this function by name.*

