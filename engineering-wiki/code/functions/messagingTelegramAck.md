# messagingTelegramAck()

Best-effort reply to the chat. A failed send must never break ingest.

Every outcome sends the SAME neutral text: telling a stranger "found your
account" would let anyone holding a phone confirm who is in this install.

```php
function messagingTelegramAck(array $channel, string $chatId, string $text): void
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 815.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$channel` | `array` |  |  |
| `$chatId` | `string` |  |  |
| `$text` | `string` |  |  |

**Returns:** `void`

## Calls

[messagingProvider()](/code/functions/messagingProvider.md)

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingTelegramLinkPhone()](/code/functions/messagingTelegramLinkPhone.md)

