# api/system/debug-tools/D002_delete_ticket.php

> API endpoint - 429 lines

Debug Tool D002 — Delete Ticket (with full SQL trace)

For the support case where deleting a ticket fails with a foreign-key error
(typically "1451 Cannot delete or update a parent row" from
email_attachments → emails). Enter a ticket reference (ticket_number) and
this tool:
  1. Resolves the ticket and shows what it found.
  2. Audits every table the delete touches — existence, key columns, and the
     actual foreign-key constraints + their ON DELETE rule.
  3. Counts the child rows that will be removed.
  4. Performs the delete inside a transaction, echoing EVERY SQL statement,
     its parameters and the affected row count, then COMMITs.
  5. Verifies nothing is left behind and removes orphaned attachment files.

DESTRUCTIVE: on success the ticket and all its data are permanently deleted.

Output: plain text, section-delimited with === HEADERS === for easy skimming.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D002_delete_ticket.php` |
| Protected by | Signed-in analyst (session check) |
| Reads | `GET ref`, `POST ref` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 30 |  |
| [bool_str()](/code/functions/bool_str.md) | 34 |  |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 36 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 122 |  | read [tickets](/code/tables/tickets.md) |  |
| 127 |  | read [tickets](/code/tables/tickets.md) |  |
| 219 |  | read [emails](/code/tables/emails.md) |  |
| 246 |  | read [email_attachments](/code/tables/email_attachments.md) |  |
| 271 |  | read [emails](/code/tables/emails.md) |  |
| 291 |  | read [email_attachments](/code/tables/email_attachments.md) |  |
| 317 |  | read [email_attachments](/code/tables/email_attachments.md) |  |
| 318 |  | read [emails](/code/tables/emails.md) |  |
| 319 |  | read [ticket_notes](/code/tables/ticket_notes.md) |  |
| 320 |  | read [ticket_audit](/code/tables/ticket_audit.md) |  |
| 321 |  | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 322 |  | read [ticket_recordings](/code/tables/ticket_recordings.md) |  |
| 323 |  | read [ticket_csat_responses](/code/tables/ticket_csat_responses.md) |  |
| 324 |  | read [ticket_cmdb_objects](/code/tables/ticket_cmdb_objects.md) |  |
| 325 |  | read [ticket_assets](/code/tables/ticket_assets.md) |  |
| 326 |  | read [sla_notifications_sent](/code/tables/sla_notifications_sent.md) |  |
| 327 |  | read [tasks](/code/tables/tasks.md) |  |
| 347 |  | read [email_attachments](/code/tables/email_attachments.md) |  |
| 356 |  | **delete** [email_attachments](/code/tables/email_attachments.md) |  |
| 357 |  | **delete** [emails](/code/tables/emails.md) |  |
| 358 |  | **delete** [ticket_notes](/code/tables/ticket_notes.md) |  |
| 359 |  | **delete** [ticket_audit](/code/tables/ticket_audit.md) |  |
| 360 |  | **delete** [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 361 |  | **delete** [tickets](/code/tables/tickets.md) |  |
| 399 |  | read [tickets](/code/tables/tickets.md) |  |
| 401 |  | read [email_attachments](/code/tables/email_attachments.md) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dbConnectionOptions()](/code/functions/dbConnectionOptions.md)

