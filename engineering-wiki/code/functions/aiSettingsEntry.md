# aiSettingsEntry()

Returns a namespace's registry entry (label, default provider and model); throws RuntimeException for an unknown namespace.

```php
function aiSettingsEntry(string $ns): array
```

Defined in [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), line 110.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ns` | `string` |  |  |

**Returns:** `array`

## Calls

[aiSettingsRegistry()](/code/functions/aiSettingsRegistry.md)

## Called from

- [includes/ai_settings.php](/code/files/includes/ai_settings.php.md) - in [aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [aiSettingsSave()](/code/functions/aiSettingsSave.md)

