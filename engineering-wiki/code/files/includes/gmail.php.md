# includes/gmail.php

> PHP - 639 lines

Gmail API Helper Functions

Provides send/read/refresh/delete operations for Google mailboxes.
Mirrors the Microsoft Graph API functions used elsewhere.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [gmailRefreshAccessToken()](/code/functions/gmailRefreshAccessToken.md) | 16 | Refresh a Google access token using the refresh token. Returns the updated token data array. |
| [gmailGetValidAccessToken()](/code/functions/gmailGetValidAccessToken.md) | 74 | Get a valid Google access token, refreshing if expired. |
| [gmailSendEmail()](/code/functions/gmailSendEmail.md) | 94 | Send an email via the Gmail API. |
| [gmailApiGet()](/code/functions/gmailApiGet.md) | 154 | An authenticated Gmail API GET, returning ['code' => int, 'body' => array\|null]. Every caller was writing the same twelve lines of curl. |
| [gmailListLabels()](/code/functions/gmailListLabels.md) | 171 | Every label on the account, as Gmail returns them (id, name, type, ...). |
| [gmailFindLabel()](/code/functions/gmailFindLabel.md) | 180 | Find one label by display name, case-insensitively. Null when there is no match. |
| [gmailResolveListLabelId()](/code/functions/gmailResolveListLabelId.md) | 209 | Resolve the configured folder to the label id the message list should be scoped to. |
| [gmailGetEmails()](/code/functions/gmailGetEmails.md) | 229 | Fetch unread emails from Gmail. Returns an array of messages normalised to the same shape as Graph API results. |
| [gmailGetMessage()](/code/functions/gmailGetMessage.md) | 275 | Fetch a single Gmail message and normalise to Graph-like structure. |
| [gmailGetAttachmentsGraphShape()](/code/functions/gmailGetAttachmentsGraphShape.md) | 364 | Fetch Gmail attachments for a message and return them in the Graph fileAttachment shape the importer (saveAttachment) expects. Walks nested multiparts. |
| [gmailExtractBody()](/code/functions/gmailExtractBody.md) | 429 | Extract body (prefer HTML, fall back to plain text). |
| [gmailParseAddressList()](/code/functions/gmailParseAddressList.md) | 461 | Parse a comma-separated address list into Graph-like format. |
| [gmailTrashMessage()](/code/functions/gmailTrashMessage.md) | 479 | Delete a Gmail message (move to trash). |
| [gmailMarkAsRead()](/code/functions/gmailMarkAsRead.md) | 505 | Mark a Gmail message as read (remove UNREAD label). |
| [gmailGetAttachments()](/code/functions/gmailGetAttachments.md) | 527 | Get Gmail attachments for a message. Returns array of [filename, mimeType, data (base64-decoded)]. |
| [gmailVerifyFolder()](/code/functions/gmailVerifyFolder.md) | 576 | Verify a label exists in a Google mailbox and report what the reader will see. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 64 | `gmailRefreshAccessToken` | **update** [target_mailboxes](/code/tables/target_mailboxes.md) (`token_data`) |  |

## How it hangs together

**Includes:** [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/mime_message.php](/code/files/includes/mime_message.php.md)

**Included by:** [api/tickets/verify_mailbox_folder.php](/code/files/api/tickets/verify_mailbox_folder.php.md), [includes/mailbox_send.php](/code/files/includes/mailbox_send.php.md), [includes/self_service_email.php](/code/files/includes/self_service_email.php.md), [includes/template_email.php](/code/files/includes/template_email.php.md)

**Calls:** [encryptValue()](/code/functions/encryptValue.md), [mimeBuildMessage()](/code/functions/mimeBuildMessage.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

