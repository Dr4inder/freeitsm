# aiSettingsForUi()

UI-safe view of the config — never returns the plaintext key, only a mask and a has_key flag.

```php
function aiSettingsForUi(PDO $conn, string $ns): array
```

Defined in [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), line 204.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ns` | `string` |  |  |

**Returns:** `array`

## Calls

[aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [maskSecret()](/code/functions/maskSecret.md)

## Called from

- [api/system/ai/get_settings.php](/code/files/api/system/ai/get_settings.php.md)

