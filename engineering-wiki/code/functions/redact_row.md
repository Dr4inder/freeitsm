# redact_row()

```php
function redact_row(
    $row,
    $redactCols = ['password_hash', 'totp_secret', 'username', 'email', 'full_name', 'display_name', 'preferred_name']
)
```

Defined in [api/system/debug-tools/D001_demo_core_import.php](/code/files/api/system/debug-tools/D001_demo_core_import.php.md), line 33.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` |  |  |  |
| `$redactCols` |  | `['password_hash', 'totp_secret', 'username', 'email', 'full_name', 'display_name', 'preferred_name']` |  |

## Called from

- [api/system/debug-tools/D001_demo_core_import.php](/code/files/api/system/debug-tools/D001_demo_core_import.php.md)

