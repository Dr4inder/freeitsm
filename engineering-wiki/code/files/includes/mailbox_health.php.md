# includes/mailbox_health.php

> PHP - 168 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [mailboxHealthProblems()](/code/functions/mailboxHealthProblems.md) | 40 | Every warning here can be dismissed, because every one of them can legitimately be somebody's deliberate choice: a mailbox that genuinely should record no origin, a receive-only IMAP mailbox with no outgoing server, a low-traffic mailbox nobody minds being checked rarely. Dismissing says "I know", and the item drops out of the ! while staying visible, and reversible, inside it. |

## How it hangs together

**Included by:** [api/tickets/get_mailboxes.php](/code/files/api/tickets/get_mailboxes.php.md), [api/tickets/set_mailbox_health_dismissed.php](/code/files/api/tickets/set_mailbox_health_dismissed.php.md)

