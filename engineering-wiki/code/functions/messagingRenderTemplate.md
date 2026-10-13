# messagingRenderTemplate()

Substitute {{1}}, {{2}}, … in a template body with the given ordered values, for storing/showing what was actually sent. Missing values are left blank.

```php
function messagingRenderTemplate(string $body, array $vars): string
```

Defined in [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md), line 336.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$body` | `string` |  |  |
| `$vars` | `array` |  |  |

**Returns:** `string`

## Called from

- [api/messaging/send_template.php](/code/files/api/messaging/send_template.php.md)
- [includes/messaging/TelegramProvider.php](/code/files/includes/messaging/TelegramProvider.php.md) - in `TelegramProvider::sendTemplate`

