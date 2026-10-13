# includes/ticket_sensitivity.php

> PHP - 310 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ticketSensitivityReady()](/code/functions/ticketSensitivityReady.md) | 45 | Have the columns been added yet? New code reaches an install before System -> Database Verification runs, and every ticket path calls into here, so a missing column must mean "do nothing", never an error. |
| [ticketSensitivityNormalise()](/code/functions/ticketSensitivityNormalise.md) | 62 | Anything unrecognised reads as normal - the column's own default. |
| [ticketSensitivityRaise()](/code/functions/ticketSensitivityRaise.md) | 75 | Make a ticket confidential if it is not already, and say why in the audit trail. Returns true if it changed. |
| [ticketSensitivityApplyDefaults()](/code/functions/ticketSensitivityApplyDefaults.md) | 102 | Apply the automatic defaults to a ticket: its service-desk department's, and the mailbox it arrived through, if there was one. Call after every insert, and after every change of department. |
| [ticketSensitivityInherit()](/code/functions/ticketSensitivityInherit.md) | 135 | A ticket made from, or combined with, others is confidential if any of them was. Used by split (one source) and merge (several). |
| [ticketIsConfidential()](/code/functions/ticketIsConfidential.md) | 158 | Is this ticket confidential? False before Database Verification (no column). |
| [ticketAiConfidentialPolicy()](/code/functions/ticketAiConfidentialPolicy.md) | 175 | Tickets -> Settings -> "Confidential tickets and AI": 'block' (the default - never send) or 'allow'. Never saved means block: an upgrade must not start sending confidential tickets to a provider it was not sending them to. |
| [ticketAiAllowed()](/code/functions/ticketAiAllowed.md) | 187 | May this ticket's content go to an AI provider? |
| [ticketAiExclusionSql()](/code/functions/ticketAiExclusionSql.md) | 201 | For AI features that read MANY tickets (problem root cause, suggested problems, knowledge gap analysis, Warbot): an SQL condition that leaves the confidential ones out, or '' when the policy allows them or the column does not exist yet. Pass the tickets table's alias. |
| [ticketAiSubjectSql()](/code/functions/ticketAiSubjectSql.md) | 212 | The ticket's subject as an AI may see it: 'Confidential ticket' in place of a confidential one's (under the block policy), so a count or a list stays true while its content stays home. An SQL expression; pass the tickets alias. |
| [ticketRedactForOutbound()](/code/functions/ticketRedactForOutbound.md) | 229 | A workflow event's payload as it may leave for a webhook, Slack or Teams (discussion #62). Unchanged for a normal ticket. For a confidential one it is cut down to an ALLOW-LIST - identifiers, number, status, priority, department, team, dates - because a deny-list of "content" fields would miss the next one somebody adds. The subject becomes "Confidential ticket" and `confidential` is set, so a message template still reads sensibly. |
| [ticketEmailRecipientsAllowed()](/code/functions/ticketEmailRecipientsAllowed.md) | 275 | May a workflow email about this ticket go to these addresses? |
| [ticketSensitivitySelectSql()](/code/functions/ticketSensitivitySelectSql.md) | 306 | The SELECT expression for a ticket's sensitivity that is safe before Database Verification has added the column. Pass the tickets alias. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `ticketSensitivityReady` | read [tickets](/code/tables/tickets.md) |  |
| 51 | `ticketSensitivityReady` | read [departments](/code/tables/departments.md) |  |
| 52 | `ticketSensitivityReady` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |
| 80 | `ticketSensitivityRaise` | **update** [tickets](/code/tables/tickets.md) (`sensitivity`) |  |
| 86 | `ticketSensitivityRaise` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |
| 108 | `ticketSensitivityApplyDefaults` | read [tickets](/code/tables/tickets.md), read [departments](/code/tables/departments.md) |  |
| 119 | `ticketSensitivityApplyDefaults` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |
| 142 | `ticketSensitivityInherit` | read [tickets](/code/tables/tickets.md) |  |
| 162 | `ticketIsConfidential` | read [tickets](/code/tables/tickets.md) |  |
| 178 | `ticketAiConfidentialPolicy` | read [system_settings](/code/tables/system_settings.md) |  |
| 283 | `ticketEmailRecipientsAllowed` | read [tickets](/code/tables/tickets.md), read [users](/code/tables/users.md) |  |
| 287 | `ticketEmailRecipientsAllowed` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md)

**Included by:** [api/integrations/escalate_ticket.php](/code/files/api/integrations/escalate_ticket.php.md), [api/knowledge/ai_chat.php](/code/files/api/knowledge/ai_chat.php.md), [api/knowledge/writeup_stream.php](/code/files/api/knowledge/writeup_stream.php.md), [api/messaging/ai_suggest_reply.php](/code/files/api/messaging/ai_suggest_reply.php.md), [api/messaging/ai_summary.php](/code/files/api/messaging/ai_summary.php.md), [api/problem-management/ai_root_cause.php](/code/files/api/problem-management/ai_root_cause.php.md), [api/problem-management/ai_suggest_problem.php](/code/files/api/problem-management/ai_suggest_problem.php.md), [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md), [api/self-service/get_tickets.php](/code/files/api/self-service/get_tickets.php.md), [api/self-service/get_ticket_detail.php](/code/files/api/self-service/get_ticket_detail.php.md), [api/self-service/mark_confidential.php](/code/files/api/self-service/mark_confidential.php.md), [api/system/assign_ticket_department.php](/code/files/api/system/assign_ticket_department.php.md), [api/tickets/ai_cleanup_reply.php](/code/files/api/tickets/ai_cleanup_reply.php.md), [api/tickets/ai_merge_summary.php](/code/files/api/tickets/ai_merge_summary.php.md), [api/tickets/ai_read.php](/code/files/api/tickets/ai_read.php.md), [api/tickets/ai_summary.php](/code/files/api/tickets/ai_summary.php.md), [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), [api/tickets/get_departments.php](/code/files/api/tickets/get_departments.php.md), [api/tickets/get_emails.php](/code/files/api/tickets/get_emails.php.md), [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md), [api/tickets/get_mailboxes.php](/code/files/api/tickets/get_mailboxes.php.md), [api/tickets/save_department.php](/code/files/api/tickets/save_department.php.md), [api/tickets/save_mailbox.php](/code/files/api/tickets/save_mailbox.php.md), [api/workflow/webhook_test.php](/code/files/api/workflow/webhook_test.php.md), [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md), [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md), [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md), [includes/managers.php](/code/files/includes/managers.php.md), [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Calls:** [calendarSyncReconcileTicket()](/code/functions/calendarSyncReconcileTicket.md)

