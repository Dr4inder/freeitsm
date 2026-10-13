# settingGetDecrypted()

One setting, decrypted. See `settingsGetDecrypted()`.

```php
function settingGetDecrypted(PDO $conn, string $key, string $default = ''): string
```

Defined in [includes/encryption.php](/code/files/includes/encryption.php.md), line 373.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$default` | `string` | `''` |  |

**Returns:** `string`

## Calls

[settingsGetDecrypted()](/code/functions/settingsGetDecrypted.md)

*Nothing calls this function by name.*

