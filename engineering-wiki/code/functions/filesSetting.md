# filesSetting()

Reads a Files setting from system_settings, cached per request; blank or missing gives `$default`.

```php
function filesSetting(PDO $conn, string $key, string $default = ''): string
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 25.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$default` | `string` | `''` |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 29 | `filesSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## Called from

- [api/files/settings.php](/code/files/api/files/settings.php.md)
- [includes/files/storage.php](/code/files/includes/files/storage.php.md) - in [filesStorageRoot()](/code/functions/filesStorageRoot.md), [filesMaxUploadBytes()](/code/functions/filesMaxUploadBytes.md), [filesDesktopLogo()](/code/functions/filesDesktopLogo.md)

