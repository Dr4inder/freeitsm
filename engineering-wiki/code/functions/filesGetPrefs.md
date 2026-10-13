# filesGetPrefs()

Per-person desktop preferences, in user_preferences with a files_ prefix.

```php
function filesGetPrefs(PDO $conn, int $analystId): array
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 115.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 117 | `filesGetPrefs` | read [user_preferences](/code/tables/user_preferences.md) |  |

## Called from

- [files/index.php](/code/files/files/index.php.md)

