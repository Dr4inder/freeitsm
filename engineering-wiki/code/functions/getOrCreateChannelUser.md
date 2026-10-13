# getOrCreateChannelUser()

Get-or-create a placeholder requester keyed by phone, so repeat senders map to one user. The users table requires an email, so we synthesise a stable non-routable address ('+44…@whatsapp.local'); the real identity is the display name (the WhatsApp profile name) shown on the ticket.

```php
function getOrCreateChannelUser(
    PDO $conn,
    string $from,
    string $displayName,
    string $channelType
): ?int
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 887.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$from` | `string` |  |  |
| `$displayName` | `string` |  |  |
| `$channelType` | `string` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 895 | `getOrCreateChannelUser` | read [users](/code/tables/users.md) |  |
| 901 | `getOrCreateChannelUser` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `created_at`) |  |

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md), [resolveSlackRequester()](/code/functions/resolveSlackRequester.md), [resolveDirectoryRequester()](/code/functions/resolveDirectoryRequester.md), [messagingTelegramResolveIdentity()](/code/functions/messagingTelegramResolveIdentity.md)

