# handleRemoveMember()

```php
function handleRemoveMember(PDO $conn, array $input): void
```

Defined in [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md), line 389.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$input` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 400 | `handleRemoveMember` | **delete** [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md) |  |

## Called from

- [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md)

