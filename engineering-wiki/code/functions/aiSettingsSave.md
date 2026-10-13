# aiSettingsSave()

Persist a config. Validates provider; encrypts the key; honours masked/empty "no change" so saving provider+model alone never wipes the key.

```php
function aiSettingsSave(PDO $conn, string $ns, array $data): void
```

Defined in [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), line 232.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ns` | `string` |  |  |
| `$data` | `array` |  | ['provider','model','api_key'?] |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 245 | `aiSettingsSave` | **update** [system_settings](/code/tables/system_settings.md) (`setting_value`) |  |
| 248 | `aiSettingsSave` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Calls

[aiSettingsEntry()](/code/functions/aiSettingsEntry.md), [aiSettingsKeys()](/code/functions/aiSettingsKeys.md), [encryptValue()](/code/functions/encryptValue.md), [isMaskedNoChangeValue()](/code/functions/isMaskedNoChangeValue.md)

## Called from

- [api/system/ai/save_settings.php](/code/files/api/system/ai/save_settings.php.md)

