# templateGetValidAccessToken()

Get a valid access token, refreshing if expired.

```php
function templateGetValidAccessToken(PDO $conn, array $mailbox, array $tokenData): ?string
```

Defined in [includes/template_email.php](/code/files/includes/template_email.php.md), line 481.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$mailbox` | `array` |  |  |
| `$tokenData` | `array` |  |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 521 | `templateGetValidAccessToken` | **update** [target_mailboxes](/code/tables/target_mailboxes.md) (`token_data`) |  |

## Calls

[encryptValue()](/code/functions/encryptValue.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/template_email.php](/code/files/includes/template_email.php.md) - in [templateGraphContext()](/code/functions/templateGraphContext.md)

