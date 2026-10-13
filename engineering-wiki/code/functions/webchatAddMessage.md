# webchatAddMessage()

Append a message to a conversation's pre-ticket transcript (webchat_messages). sender is 'visitor'|'ai'|'agent'|'system'. `$sourceEmailId` links a mirrored analyst reply back to its `emails` row so it's only mirrored once. Returns the new id.

```php
function webchatAddMessage(
    PDO $conn,
    int $conversationId,
    string $sender,
    string $body,
    ?int $sourceEmailId = null
): int
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 388.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$conversationId` | `int` |  |  |
| `$sender` | `string` |  |  |
| `$body` | `string` |  |  |
| `$sourceEmailId` | `?int` | `null` |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 391 | `webchatAddMessage` | **insert** [webchat_messages](/code/tables/webchat_messages.md) (`conversation_id`, `sender`, `body`, `source_email_id`, `created_datetime`) |  |
| 396 | `webchatAddMessage` | **update** [webchat_conversations](/code/tables/webchat_conversations.md) (`last_activity_datetime`) |  |

## Called from

- [api/webchat/escalate.php](/code/files/api/webchat/escalate.php.md)
- [api/webchat/send.php](/code/files/api/webchat/send.php.md)
- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatMirrorAgentReplies()](/code/functions/webchatMirrorAgentReplies.md)

