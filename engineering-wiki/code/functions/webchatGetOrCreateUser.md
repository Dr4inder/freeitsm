# webchatGetOrCreateUser()

Find-or-create the requester for a web chat conversation, keyed by the real email the visitor gave. Returns the user id, or null if the users table is unavailable.

```php
function webchatGetOrCreateUser(PDO $conn, string $email, string $name): ?int
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 152.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$email` | `string` |  |  |
| `$name` | `string` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 159 | `webchatGetOrCreateUser` | read [users](/code/tables/users.md) |  |
| 164 | `webchatGetOrCreateUser` | **update** [users](/code/tables/users.md) (`display_name`) |  |
| 169 | `webchatGetOrCreateUser` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `created_at`) |  |

## Called from

- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatOpenTicket()](/code/functions/webchatOpenTicket.md)

