# includes/uploads.php

> PHP - 963 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [uploadStoreFile()](/code/functions/uploadStoreFile.md) | 142 | Validate one `$_FILES` entry and move it somewhere safe. |
| [uploadPrepareDir()](/code/functions/uploadPrepareDir.md) | 222 | Create an upload directory and drop execution protection into it. |
| [uploadPrepareWebServableDir()](/code/functions/uploadPrepareWebServableDir.md) | 365 | Prepare a directory whose contents the BROWSER IS MEANT TO FETCH. |
| [htaccessUnguardedPhpDirectives()](/code/functions/htaccessUnguardedPhpDirectives.md) | 495 | Line numbers (1-based) of every php_flag / php_value / php_admin_* directive in an .htaccess that is NOT inside an <IfModule> for mod_php. |
| [htaccessGuardPhpDirectives()](/code/functions/htaccessGuardPhpDirectives.md) | 529 | Wrap every unguarded PHP directive in an .htaccess in <IfModule> blocks for mod_php 8 (mod_php.c) and mod_php 7 (mod_php7.c), keeping its indentation and the file's own line endings. Returns the text unchanged when there is nothing to do, so it is safe to run on every file every time. |
| [uploadRepairHtaccessFile()](/code/functions/uploadRepairHtaccessFile.md) | 549 | Repair one .htaccess in place. True if it was changed. |
| [uploadRepairHtaccessTree()](/code/functions/uploadRepairHtaccessTree.md) | 566 | Repair every .htaccess under the upload folders. Returns how many changed. |
| [uploadCleanName()](/code/functions/uploadCleanName.md) | 594 | The original filename, reduced to something safe to STORE AND DISPLAY. |
| [uploadDetectMime()](/code/functions/uploadDetectMime.md) | 608 | The file's real mime type, or null if this server cannot tell us. |
| [uploadErrorMessage()](/code/functions/uploadErrorMessage.md) | 623 | PHP's upload error codes as something a person can act on. |
| [uploadFormatBytes()](/code/functions/uploadFormatBytes.md) | 637 |  |
| [attachmentServeRules()](/code/functions/attachmentServeRules.md) | 711 | Decide how to serve a stored attachment, from its filename alone. |
| [attachmentSendHeaders()](/code/functions/attachmentSendHeaders.md) | 728 | Emit the Content-Type / Content-Disposition / nosniff headers for an attachment. Callers still do their own authorisation and file-existence checks first. |
| [uploadStoreBytes()](/code/functions/uploadStoreBytes.md) | 785 | Store ingested bytes safely, applying the install's policy for types we do not accept. |
| [uploadDetectMimeFromBytes()](/code/functions/uploadDetectMimeFromBytes.md) | 865 | The real mime type of bytes held in memory, or null if this server cannot tell. |
| [attachmentRejectPolicy()](/code/functions/attachmentRejectPolicy.md) | 884 | The install's policy for an attachment whose type we do not accept. |
| [attachmentAllowedTypes()](/code/functions/attachmentAllowedTypes.md) | 914 | Which attachment types this install actually accepts. |
| [attachmentIngestNotice()](/code/functions/attachmentIngestNotice.md) | 944 | The block appended to a message body when attachments were not accepted, so the outcome is visible on the ticket instead of a file quietly vanishing. Returns '' when there is nothing to say. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 889 | `attachmentRejectPolicy` | read [system_settings](/code/tables/system_settings.md) |  |
| 920 | `attachmentAllowedTypes` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Includes:** [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md)

**Included by:** [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md), [api/assets/save_asset_label_settings.php](/code/files/api/assets/save_asset_label_settings.php.md), [api/change-management/upload_attachment.php](/code/files/api/change-management/upload_attachment.php.md), [api/documents/download.php](/code/files/api/documents/download.php.md), [api/documents/save.php](/code/files/api/documents/save.php.md), [api/forms/image.php](/code/files/api/forms/image.php.md), [api/forms/upload_image.php](/code/files/api/forms/upload_image.php.md), [api/messaging/media.php](/code/files/api/messaging/media.php.md), [api/messaging/send_attachment.php](/code/files/api/messaging/send_attachment.php.md), [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md), [api/self-service/get_attachment.php](/code/files/api/self-service/get_attachment.php.md), [api/self-service/get_document.php](/code/files/api/self-service/get_document.php.md), [api/self-service/reply_ticket.php](/code/files/api/self-service/reply_ticket.php.md), [api/system/db_verify.php](/code/files/api/system/db_verify.php.md), [api/system/debug-tools/D012_ticket_attachments.php](/code/files/api/system/debug-tools/D012_ticket_attachments.php.md), [api/system/save_branding.php](/code/files/api/system/save_branding.php.md), [api/system/self_service_portal.php](/code/files/api/system/self_service_portal.php.md), [api/system/tenant_logo.php](/code/files/api/system/tenant_logo.php.md), [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), [api/tickets/get_attachment.php](/code/files/api/tickets/get_attachment.php.md), [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), [includes/files/storage.php](/code/files/includes/files/storage.php.md), [includes/lms_package.php](/code/files/includes/lms_package.php.md), [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), [includes/warroom.php](/code/files/includes/warroom.php.md)

**Calls:** [attachmentMaxBytes()](/code/functions/attachmentMaxBytes.md)

