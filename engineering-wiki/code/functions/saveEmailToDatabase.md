# saveEmailToDatabase()

Save email to database

```php
function saveEmailToDatabase(
    $conn,
    $email,
    $accessToken,
    $mailboxId,
    ?array $prefetched = null,
    array $strip = [],
    ?int $maxBytes = null
)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1012.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$email` |  |  |  |
| `$accessToken` |  |  |  |
| `$mailboxId` |  |  |  |
| `$prefetched` | `?array` | `null` |  |
| `$strip` | `array` | `[]` |  |
| `$maxBytes` | `?int` | `null` |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1019 | `saveEmailToDatabase` | read [emails](/code/tables/emails.md) |  |
| 1073 | `saveEmailToDatabase` | **update** [tickets](/code/tables/tickets.md) (`updated_datetime`) |  |
| 1120 | `saveEmailToDatabase` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |
| 1128 | `saveEmailToDatabase` | **insert** [tickets](/code/tables/tickets.md) (`ticket_number`, `subject`, `status_id`, `priority_id`, `created_datetime`, `updated_datetime`, `user_id`, `tenant_id`, `origin_id`), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 1151 | `saveEmailToDatabase` | **insert** [emails](/code/tables/emails.md) (`exchange_message_id`, `subject`, `from_address`, `from_name`, `to_recipients`, `cc_recipients`, `received_datetime`, `body_preview`, `body_content`, `body_type`, `has_attachments`, `importance`) |  |
| 1204 | `saveEmailToDatabase` | read [tickets](/code/tables/tickets.md), read [users](/code/tables/users.md) |  |
| 1287 | `saveEmailToDatabase` | **update** [emails](/code/tables/emails.md) (`body_content`, `has_attachments`) |  |

## Calls

[attachmentIngestNotice()](/code/functions/attachmentIngestNotice.md), [extractTicketReference()](/code/functions/extractTicketReference.md), [fetchEmailAttachments()](/code/functions/fetchEmailAttachments.md), [findTicketByNumber()](/code/functions/findTicketByNumber.md), [generateTicketNumber()](/code/functions/generateTicketNumber.md), [getOrCreateUser()](/code/functions/getOrCreateUser.md), [logEmailImport()](/code/functions/logEmailImport.md), [reopenTicketForCustomerReply()](/code/functions/reopenTicketForCustomerReply.md), [resolveTicketTenantForEmail()](/code/functions/resolveTicketTenantForEmail.md), [rewriteCidReferences()](/code/functions/rewriteCidReferences.md), [saveAttachment()](/code/functions/saveAttachment.md), [searchCorpusReady()](/code/functions/searchCorpusReady.md), [searchIndexTicket()](/code/functions/searchIndexTicket.md), [stripInboundThread()](/code/functions/stripInboundThread.md), [ticketDispatchCreated()](/code/functions/ticketDispatchCreated.md), [ticketSensitivityApplyDefaults()](/code/functions/ticketSensitivityApplyDefaults.md), [wakeSnoozedTicketOnCustomerReply()](/code/functions/wakeSnoozedTicketOnCustomerReply.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

