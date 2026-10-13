# getOrCreateUser()

Get or create user by email address Returns the user ID

```php
function getOrCreateUser($conn, $email, $displayName)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 843.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$email` |  |  |  |
| `$displayName` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 848 | `getOrCreateUser` | read [users](/code/tables/users.md) |  |
| 856 | `getOrCreateUser` | **update** [users](/code/tables/users.md) (`display_name`) |  |
| 864 | `getOrCreateUser` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `created_at`) |  |

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [saveEmailToDatabase()](/code/functions/saveEmailToDatabase.md)

