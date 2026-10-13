# wtScopeFor()

The scope this analyst last chose. Defaults to everyone, i.e. today's view.

```php
function wtScopeFor(PDO $conn, int $analystId): string
```

Defined in [includes/watchtower_settings.php](/code/files/includes/watchtower_settings.php.md), line 138.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 143 | `wtScopeFor` | read [user_preferences](/code/tables/user_preferences.md) |  |

## Calls

[wtScopeIsValid()](/code/functions/wtScopeIsValid.md)

## Called from

- [api/watchtower/get_dashboard.php](/code/files/api/watchtower/get_dashboard.php.md)
- [watchtower/index.php](/code/files/watchtower/index.php.md)

