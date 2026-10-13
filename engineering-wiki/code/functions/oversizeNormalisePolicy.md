# oversizeNormalisePolicy()

A policy as posted by a settings screen (MB, strings), made safe. Used for the mailbox override on save and on read, so a hand-edited row cannot break a check.

```php
function oversizeNormalisePolicy(array $p, ?array $fallback = null): array
```

Defined in [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md), line 107.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$p` | `array` |  |  |
| `$fallback` | `?array` | `null` |  |

**Returns:** `array`

## Calls

[attachmentMb()](/code/functions/attachmentMb.md), [oversizeCleanAddresses()](/code/functions/oversizeCleanAddresses.md), [oversizeDefaultReplyText()](/code/functions/oversizeDefaultReplyText.md)

## Called from

- [api/tickets/oversize_settings.php](/code/files/api/tickets/oversize_settings.php.md)
- [api/tickets/save_mailbox.php](/code/files/api/tickets/save_mailbox.php.md)
- [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) - in [oversizeRules()](/code/functions/oversizeRules.md)

