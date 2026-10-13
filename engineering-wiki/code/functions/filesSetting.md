# filesSetting()

```php
function filesSetting(PDO $conn, string $key, string $default = ''): string
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 24.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$default` | `string` | `''` |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 28 | `filesSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## Called from

- [api/files/settings.php](/code/files/api/files/settings.php.md)
- [includes/files/storage.php](/code/files/includes/files/storage.php.md) - in [filesStorageRoot()](/code/functions/filesStorageRoot.md), [filesMaxUploadBytes()](/code/functions/filesMaxUploadBytes.md), [filesDesktopLogo()](/code/functions/filesDesktopLogo.md)

