# saveChannelMediaAttachment()

Stores one downloaded media file as an attachment on the channel message's email row.

```php
function saveChannelMediaAttachment(
    PDO $conn,
    int $emailId,
    string $filename,
    string $contentType,
    string $data
): array
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 966.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$emailId` | `int` |  |  |
| `$filename` | `string` |  |  |
| `$contentType` | `string` |  |  |
| `$data` | `string` |  |  |

**Returns:** array{stored:bool, reason:?string} — reason is set when the file was rejected or quarantined.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 988 | `saveChannelMediaAttachment` | **insert** [email_attachments](/code/tables/email_attachments.md) (`email_id`, `exchange_attachment_id`, `filename`, `content_type`, `content_id`, `file_path`, `file_size`, `is_inline`) |  |

## Calls

[attachmentAllowedTypes()](/code/functions/attachmentAllowedTypes.md), [attachmentRejectPolicy()](/code/functions/attachmentRejectPolicy.md), [uploadStoreBytes()](/code/functions/uploadStoreBytes.md)

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md)
- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatPromoteToTicket()](/code/functions/webchatPromoteToTicket.md)

