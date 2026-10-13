# tikaTimeout()

```php
function tikaTimeout(PDO $conn): int
```

Defined in [includes/search/tika.php](/code/files/includes/search/tika.php.md), line 82.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 87 | `tikaTimeout` | read [system_settings](/code/tables/system_settings.md) |  |

## Calls

[tikaTimeoutOverride()](/code/functions/tikaTimeoutOverride.md)

## Called from

- [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md)
- [includes/search/tika.php](/code/files/includes/search/tika.php.md) - in [tikaExtract()](/code/functions/tikaExtract.md)

