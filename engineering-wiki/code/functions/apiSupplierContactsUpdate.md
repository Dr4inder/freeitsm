# apiSupplierContactsUpdate()

PATCH /suppliers/{id}/contacts/{contactId} - updates the fields sent, keeping the rest. First name and surname cannot be emptied.

```php
function apiSupplierContactsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 518.

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
| 521 | `apiSupplierContactsUpdate` | read [contacts](/code/tables/contacts.md) |  |
| 540 | `apiSupplierContactsUpdate` | **update** [contacts](/code/tables/contacts.md) (`first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`) |  |
| 545 | `apiSupplierContactsUpdate` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadSupplier()](/code/functions/apiLoadSupplier.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeContact()](/code/functions/apiSerializeContact.md)

*Nothing calls this function by name.*

