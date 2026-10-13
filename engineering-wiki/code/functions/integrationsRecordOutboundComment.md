# integrationsRecordOutboundComment()

Record a comment we PUSHED, so it is recognised if it comes back.

Guard 1 of echo suppression. Called by send_note_to_tracker straight after the
provider returns the new comment's id. Never throws: failing to record an echo
marker must not fail the workflow run that successfully posted the comment.

```php
function integrationsRecordOutboundComment(
    PDO $conn,
    int $linkId,
    string $externalCommentId,
    ?int $localNoteId = null
): void
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1199.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$linkId` | `int` |  |  |
| `$externalCommentId` | `string` |  |  |
| `$localNoteId` | `?int` | `null` |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1204 | `integrationsRecordOutboundComment` | **insert** [integration_comment_map](/code/tables/integration_comment_map.md) (`link_id`, `direction`, `external_comment_id`, `local_note_id`, `created_datetime`) |  |

## Calls

[integrationsCommentSchemaReady()](/code/functions/integrationsCommentSchemaReady.md)

## Called from

- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_note_to_tracker`

