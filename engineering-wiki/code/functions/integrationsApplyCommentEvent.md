# integrationsApplyCommentEvent()

Apply one canonical comment event: an internal note on the ticket, plus the map row that stops it ever being imported twice.

⚠️ THE MAP ROW IS WRITTEN FIRST, and its UNIQUE (link_id, external_comment_id)
key is what actually guarantees "once". Writing the note first and the marker
second would let two overlapping cron runs both pass the "already imported?"
read and both post the note — the classic check-then-act race. Here the second
writer loses on the key before any note exists.

⚠️ Always internal. A Jira comment is dev-to-analyst; it is written by people
who do not know a customer can see it, and it must never reach the requester
except by an analyst deciding so.

```php
function integrationsApplyCommentEvent(
    PDO $conn,
    array $connection,
    array $link,
    array $event
): string
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1245.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$connection` | `array` |  |  |
| `$link` | `array` |  |  |
| `$event` | `array` |  |  |

**Returns:** string '' if imported, otherwise the reason it was skipped

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1263 | `integrationsApplyCommentEvent` | **insert** [integration_comment_map](/code/tables/integration_comment_map.md) (`link_id`, `direction`, `external_comment_id`, `author_identity`, `author_name`, `created_datetime`) |  |
| 1281 | `integrationsApplyCommentEvent` | **insert** [ticket_notes](/code/tables/ticket_notes.md) (`ticket_id`, `analyst_id`, `note_text`, `is_internal`, `created_datetime`) |  |
| 1286 | `integrationsApplyCommentEvent` | **update** [integration_comment_map](/code/tables/integration_comment_map.md) (`local_note_id`) |  |
| 1288 | `integrationsApplyCommentEvent` | **update** [tickets](/code/tables/tickets.md) (`updated_datetime`) |  |

## Calls

[integrationsCommentNoteText()](/code/functions/integrationsCommentNoteText.md), [integrationsCommentSkipReason()](/code/functions/integrationsCommentSkipReason.md), [integrationsEmitTrackerEvent()](/code/functions/integrationsEmitTrackerEvent.md), [integrationsKnownCommentIds()](/code/functions/integrationsKnownCommentIds.md)

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsPullComments()](/code/functions/integrationsPullComments.md)

