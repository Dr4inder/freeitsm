# cardDavCreatePreview()

What the new card would carry, for the confirm step and for the card itself.

```php
function cardDavCreatePreview(PDO $conn, array $user, array $provider): array
```

Defined in [includes/carddav_create.php](/code/files/includes/carddav_create.php.md), line 85.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$user` | `array` |  |  |
| `$provider` | `array` |  |  |

**Returns:** `array`

## Calls

[cardDavScopeList()](/code/functions/cardDavScopeList.md)

## Called from

- [api/tickets/address_book_add.php](/code/files/api/tickets/address_book_add.php.md)
- [includes/carddav_create.php](/code/files/includes/carddav_create.php.md) - in [cardDavCreateContact()](/code/functions/cardDavCreateContact.md)

