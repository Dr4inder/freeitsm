# sendMailboxEmail()

> [!NOTE]
> Defined in 2 places (each behind a function_exists() check, or in files never loaded together): [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md)

Send email via Microsoft 365 mailbox using Graph API

```php
function sendMailboxEmail(
    $conn,
    $mailboxId,
    $toEmail,
    $subject,
    $htmlBody,
    $pdfData = null,
    $pdfFilename = null
)
```

Defined in [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), line 168.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailboxId` |  |  |  |
| `$toEmail` |  |  |  |
| `$subject` |  |  |  |
| `$htmlBody` |  |  |  |
| `$pdfData` |  | `null` |  |
| `$pdfFilename` |  | `null` |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 174 | `sendMailboxEmail` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |

## Calls

[decryptMailboxRow()](/code/functions/decryptMailboxRow.md), [getValidAccessToken()](/code/functions/getValidAccessToken.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md)
- [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md)

