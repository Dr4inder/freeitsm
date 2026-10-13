# includes/ticket_split.php

> PHP - 461 lines

Splitting a ticket.

A customer replies to "printer offline" with "…also my monitor flickers". That is
two pieces of work on one ticket: one SLA clock, one status, one assignee, and
whichever problem is fixed second looks late. Splitting moves the unrelated
messages onto a ticket of their own.

WHY THIS IS NOT THE MIRROR IMAGE OF MERGING
-------------------------------------------
Merging had to preserve the old reference because the customer already held it and
could reply to it — hence merged_into_id and the inbound-mail redirect. A split
creates a reference NOBODY HAS EVER SEEN. There is nothing to redirect, nothing to
close, and no equivalent pointer: both tickets come out of this live and
independent. That asymmetry is why this is a separate file rather than a flag on
the merge engine.

THE MODEL, AND WHY
------------------
Split at a chosen message, optionally taking every LATER message with it.

There is no industry standard here — Freshdesk splits a single customer response
and leaves later replies behind, Zendesk ships no split at all (it is a third-party
app), and Jira/ServiceNow use linked or child issues instead. The recurring
complaint across all of them is ambiguity about whether a split COPIES or MOVES.
So this MOVES, and says so: the messages leave the original, and a marker is left
in the thread where they went, because a conversation that silently jumps from
Tuesday to Friday is worse than one with an explicit gap.

⚠️ THE THREAD IS DISPLAYED NEWEST-FIRST. "Everything after" means LATER IN TIME,
which is ABOVE the chosen message on screen. The UI says "newer messages" for
exactly this reason; keep that wording if you touch it.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [splitMessagesFrom()](/code/functions/splitMessagesFrom.md) | 47 | Which messages a split would move, oldest first. |
| [splitMarkerEmailIds()](/code/functions/splitMarkerEmailIds.md) | 85 | The email ids that are split MARKERS on this ticket — the "N messages moved to X" placeholders left behind by an earlier split. |
| [splitMovableCount()](/code/functions/splitMovableCount.md) | 102 | How many movable (non-marker) messages a ticket has. This is the number that decides whether a split would empty it — see splitMarkerEmailIds for why markers don't count. |
| [splitMessagesByIds()](/code/functions/splitMessagesByIds.md) | 121 | The messages a split would move when the analyst has ticked them INDIVIDUALLY, rather than choosing an anchor and "everything newer". Returned oldest-first so the new ticket, the marker timestamp and the subject default all behave exactly as they do on the anchor path. |
| [splitTicket()](/code/functions/splitTicket.md) | 149 | Split messages off a ticket into a brand-new one. |
| [splitCreateTicket()](/code/functions/splitCreateTicket.md) | 248 | Create the ticket the messages move into. |
| [splitLeaveMarker()](/code/functions/splitLeaveMarker.md) | 301 | Leave a visible marker in the original thread where the messages left. |
| [splitAudit()](/code/functions/splitAudit.md) | 324 | Writes one ticket_audit row for a split step, best-effort - a failed audit write never stops the split. An actor id of 0 is stored as NULL. |
| [splitInfoFor()](/code/functions/splitInfoFor.md) | 340 | Splits recorded against a ticket, in both directions, for the banner. |
| [undoSplit()](/code/functions/undoSplit.md) | 377 | Undo a split: send the messages back and remove the ticket that was created. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 49 | `splitMessagesFrom` | read [emails](/code/tables/emails.md) |  |
| 65 | `splitMessagesFrom` | read [emails](/code/tables/emails.md) |  |
| 88 | `splitMarkerEmailIds` | read [ticket_splits](/code/tables/ticket_splits.md) |  |
| 106 | `splitMovableCount` | read [emails](/code/tables/emails.md) |  |
| 132 | `splitMessagesByIds` | read [emails](/code/tables/emails.md) |  |
| 194 | `splitTicket` | read [tickets](/code/tables/tickets.md) |  |
| 201 | `splitTicket` | **update** [emails](/code/tables/emails.md) (`ticket_id`) |  |
| 208 | `splitTicket` | **insert** [ticket_splits](/code/tables/ticket_splits.md) (`source_ticket_id`, `source_ticket_number`, `new_ticket_id`, `new_ticket_number`, `message_count`, `moved_email_ids`, `marker_email_id`, `split_by_id`, `split_datetime`) |  |
| 225 | `splitTicket` | **insert** [ticket_links](/code/tables/ticket_links.md) (`source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime`) |  |
| 268 | `splitCreateTicket` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 273 | `splitCreateTicket` | **insert** [tickets](/code/tables/tickets.md) (`ticket_number`, `subject`, `status_id`, `priority_id`, `department_id`, `ticket_type_id`, `assigned_analyst_id`, `origin_id`, `user_id`, `owner_id`, `tenant_id`, `created_datetime`) |  |
| 309 | `splitLeaveMarker` | **insert** [emails](/code/tables/emails.md) (`subject`, `from_address`, `from_name`, `received_datetime`, `body_content`, `body_type`, `has_attachments`, `is_read`, `ticket_id`, `direction`, `channel`, `is_initial`) |  |
| 327 | `splitAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |
| 343 | `splitInfoFor` | read [ticket_splits](/code/tables/ticket_splits.md) |  |
| 349 | `splitInfoFor` | read [ticket_splits](/code/tables/ticket_splits.md) |  |
| 380 | `undoSplit` | read [ticket_splits](/code/tables/ticket_splits.md) |  |
| 405 | `undoSplit` | read [emails](/code/tables/emails.md) |  |
| 411 | `undoSplit` | read [emails](/code/tables/emails.md) |  |
| 430 | `undoSplit` | **update** [emails](/code/tables/emails.md) (`ticket_id`) |  |
| 434 | `undoSplit` | **delete** [emails](/code/tables/emails.md) |  |
| 439 | `undoSplit` | **delete** [ticket_links](/code/tables/ticket_links.md) |  |
| 448 | `undoSplit` | **update** [ticket_splits](/code/tables/ticket_splits.md) (`undone_datetime`, `undone_by_id`) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md)

**Included by:** [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md), [api/tickets/split_ticket.php](/code/files/api/tickets/split_ticket.php.md), [api/tickets/split_ticket_preview.php](/code/files/api/tickets/split_ticket_preview.php.md), [api/tickets/undo_split.php](/code/files/api/tickets/undo_split.php.md)

**Calls:** [ticketSensitivityApplyDefaults()](/code/functions/ticketSensitivityApplyDefaults.md), [ticketSensitivityInherit()](/code/functions/ticketSensitivityInherit.md)

## Traps

> [!WARNING]
> **Line 249, in `splitCreateTicket`:** the install's numbering, never a number made here - see `messagingGenerateTicketNumber()` for what went wrong when it was.

