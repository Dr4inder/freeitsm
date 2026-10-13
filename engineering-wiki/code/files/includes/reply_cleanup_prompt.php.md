# includes/reply_cleanup_prompt.php

> PHP - 136 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [replyCleanupToneDescription()](/code/functions/replyCleanupToneDescription.md) | 14 | Map a tone name (Friendly / Formal / Brief) to the short clause inserted into the system prompt. Defaults to Friendly for unrecognised values. |
| [buildReplyCleanupSystemPrompt()](/code/functions/buildReplyCleanupSystemPrompt.md) | 28 | Build the system prompt. `$customInstructions` is appended verbatim under a dedicated heading at the end so any user-supplied rules sit AFTER the safety scaffold rather than overriding it. |

## How it hangs together

**Included by:** [api/tickets/ai_cleanup_reply.php](/code/files/api/tickets/ai_cleanup_reply.php.md), [api/tickets/get_reply_cleanup_settings.php](/code/files/api/tickets/get_reply_cleanup_settings.php.md)

