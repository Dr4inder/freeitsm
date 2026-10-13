# handleSearch()

> [!NOTE]
> Defined in 2 places (each behind a function_exists() check, or in files never loaded together): [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md)

Find people, teams and groups to add.

All four kinds in one search rather than a type picker first: you know the
NAME of who you want, not which of four tables they live in.

```php
function handleSearch(PDO $conn, array $src): void
```

Defined in [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), line 333.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$src` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 350 | `handleSearch` | read [analysts](/code/tables/analysts.md) |  |
| 351 | `handleSearch` | read [teams](/code/tables/teams.md) |  |
| 352 | `handleSearch` | read [users](/code/tables/users.md) |  |
| 353 | `handleSearch` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |

## Called from

- [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md)
- [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md)

