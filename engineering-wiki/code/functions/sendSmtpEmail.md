# sendSmtpEmail()

> [!NOTE]
> Defined in 2 places (each behind a function_exists() check, or in files never loaded together): [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md)

Send email via SMTP

```php
function sendSmtpEmail(
    $settings,
    $toEmail,
    $subject,
    $htmlBody,
    $pdfData = null,
    $pdfFilename = null
)
```

Defined in [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md), line 121.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$settings` |  |  |  |
| `$toEmail` |  |  |  |
| `$subject` |  |  |  |
| `$htmlBody` |  |  |  |
| `$pdfData` |  | `null` |  |
| `$pdfFilename` |  | `null` |  |

## Called from

- [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md)
- [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md)

