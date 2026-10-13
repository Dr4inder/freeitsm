# isSecretSettingName()

Is this key named like a credential (*_password, *_secret, *_token, *_api_key)? The rule `isEncryptedSettingKey()` falls back on, shared so a reader can refuse to send such a key in the clear (api/settings/get_system_settings.php).

```php
function isSecretSettingName($key)
```

Defined in [includes/encryption.php](/code/files/includes/encryption.php.md), line 195.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` |  |  |  |

## Called from

- [api/settings/get_system_settings.php](/code/files/api/settings/get_system_settings.php.md)
- [includes/encryption.php](/code/files/includes/encryption.php.md) - in [isEncryptedSettingKey()](/code/functions/isEncryptedSettingKey.md)

