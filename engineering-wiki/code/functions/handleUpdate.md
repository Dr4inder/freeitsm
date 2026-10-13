# handleUpdate()

```php
function handleUpdate(PDO $conn, array $input): void
```

Defined in [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md), line 287.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$input` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 295 | `handleUpdate` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 303 | `handleUpdate` | **update** [knowledge_user_groups](/code/tables/knowledge_user_groups.md) (`name`, `description`, `updated_datetime`) |  |

## Called from

- [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md)

