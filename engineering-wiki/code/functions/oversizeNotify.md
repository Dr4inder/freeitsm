# oversizeNotify()

Tell people about an oversized email: the alert to the configured addresses, and the reply to the sender. Returns processing-log steps for the inbound log.

⚠️ THE AUTO-REPLY MUST NOT BE ABLE TO LOOP. Two systems that each answer an
oversized email with an email can bounce forever, so the reply is never sent to
an automated sender (no-reply, mailer-daemon, postmaster, bounce...), never to
the mailbox itself, and at most once an hour to the same sender from the same
mailbox - checked against the inbound log, which already records every reply.

```php
function oversizeNotify(
    PDO $conn,
    array $mailbox,
    array $rules,
    string $fromAddress,
    string $fromName,
    string $subject,
    array $atts,
    array $plan,
    string $outcome,
    ?int $ticketId = null
): array
```

Defined in [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md), line 231.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$mailbox` | `array` |  |  |
| `$rules` | `array` |  |  |
| `$fromAddress` | `string` |  |  |
| `$fromName` | `string` |  |  |
| `$subject` | `string` |  |  |
| `$atts` | `array` |  | [['name','size'], ...]   `$plan` from `oversizePlan()` |
| `$plan` | `array` |  |  |
| `$outcome` | `string` |  | 'rejected' (no ticket) \| 'stripped' (ticket kept, files removed) |
| `$ticketId` | `?int` | `null` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 244 | `oversizeNotify` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[mailboxSendSimple()](/code/functions/mailboxSendSimple.md), [oversizeMbWords()](/code/functions/oversizeMbWords.md), [oversizeReplySkipReason()](/code/functions/oversizeReplySkipReason.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

