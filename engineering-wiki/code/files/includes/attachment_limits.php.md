# includes/attachment_limits.php

> PHP - 320 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [attachmentSetting()](/code/functions/attachmentSetting.md) | 40 | One setting, cached per request. |
| [attachmentMb()](/code/functions/attachmentMb.md) | 58 | A whole number of MB from a setting, clamped to something sane (0 allowed only where it means "no limit"). |
| [attachmentMaxBytes()](/code/functions/attachmentMaxBytes.md) | 67 | The install-wide largest single attachment, in bytes. What uploads.php uses when a caller sets none. |
| [oversizeDefaultReplyText()](/code/functions/oversizeDefaultReplyText.md) | 73 | The default text of the auto-reply. {subject}, {limit} and {total_limit} are filled in. |
| [oversizeRules()](/code/functions/oversizeRules.md) | 82 | The rules for one mailbox: the install defaults, overridden by the mailbox's own oversize_policy when it has one. Limits in BYTES (total 0 = no limit). |
| [oversizeNormalisePolicy()](/code/functions/oversizeNormalisePolicy.md) | 107 | A policy as posted by a settings screen (MB, strings), made safe. Used for the mailbox override on save and on read, so a hand-edited row cannot break a check. |
| [oversizeCleanAddresses()](/code/functions/oversizeCleanAddresses.md) | 126 | "a@x.com; b@y.com, junk" -> "a@x.com, b@y.com" - valid addresses only. |
| [oversizePlan()](/code/functions/oversizePlan.md) | 149 | Decide what to do with one email's attachments. |
| [oversizeMbWords()](/code/functions/oversizeMbWords.md) | 188 |  |
| [phpUploadLimits()](/code/functions/phpUploadLimits.md) | 195 | What PHP on this server will accept, for the settings screen. |
| [oversizeNotify()](/code/functions/oversizeNotify.md) | 228 | Tell people about an oversized email: the alert to the configured addresses, and the reply to the sender. Returns processing-log steps for the inbound log. |
| [oversizeReplySkipReason()](/code/functions/oversizeReplySkipReason.md) | 287 | Why NOT to auto-reply to this sender, or null to go ahead. |
| [oversizePolicyForStorage()](/code/functions/oversizePolicyForStorage.md) | 307 | A normalised policy in the shape stored on a mailbox (MB, not bytes) and read back by `oversizeNormalisePolicy()`. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `attachmentSetting` | read [system_settings](/code/tables/system_settings.md) |  |
| 241 | `oversizeNotify` | read [tickets](/code/tables/tickets.md) |  |
| 297 | `oversizeReplySkipReason` | read [mailbox_activity_log](/code/tables/mailbox_activity_log.md) |  |

## How it hangs together

**Includes:** [includes/mailbox_send.php](/code/files/includes/mailbox_send.php.md)

**Included by:** [api/tickets/oversize_settings.php](/code/files/api/tickets/oversize_settings.php.md), [api/tickets/save_mailbox.php](/code/files/api/tickets/save_mailbox.php.md), [includes/uploads.php](/code/files/includes/uploads.php.md), [system/security/index.php](/code/files/system/security/index.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [mailboxSendSimple()](/code/functions/mailboxSendSimple.md)

