# gmailRefreshAccessToken()

Refresh a Google access token using the refresh token. Returns the updated token data array.

```php
function gmailRefreshAccessToken(PDO $conn, array $mailbox, array $tokenData): array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 16.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$mailbox` | `array` |  |  |
| `$tokenData` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 64 | `gmailRefreshAccessToken` | **update** [target_mailboxes](/code/tables/target_mailboxes.md) (`token_data`) |  |

## Calls

[encryptValue()](/code/functions/encryptValue.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailGetValidAccessToken()](/code/functions/gmailGetValidAccessToken.md)

