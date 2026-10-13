# getValidAccessToken()

> [!NOTE]
> Defined in 4 places (each behind a function_exists() check, or in files never loaded together): [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md), [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)

Get valid access token (refresh if expired)

```php
function getValidAccessToken($conn, $mailbox, $tokenData)
```

Defined in [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), line 259.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailbox` |  |  |  |
| `$tokenData` |  |  |  |

## Calls

[refreshAccessToken()](/code/functions/refreshAccessToken.md), [saveTokenData()](/code/functions/saveTokenData.md)

## Called from

- [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md) - in [sendMailboxEmail()](/code/functions/sendMailboxEmail.md)
- [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md) - in [sendMailboxEmail()](/code/functions/sendMailboxEmail.md)
- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)
- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)

