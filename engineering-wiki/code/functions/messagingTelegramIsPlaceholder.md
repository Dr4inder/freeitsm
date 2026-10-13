# messagingTelegramIsPlaceholder()

Is this user id this chat's own placeholder (and not a real person)?

```php
function messagingTelegramIsPlaceholder(PDO $conn, int $userId, string $chatId): bool
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 522.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$userId` | `int` |  |  |
| `$chatId` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 524 | `messagingTelegramIsPlaceholder` | read [users](/code/tables/users.md) |  |

## Calls

[messagingTelegramPlaceholderEmail()](/code/functions/messagingTelegramPlaceholderEmail.md)

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingTelegramLinkPhone()](/code/functions/messagingTelegramLinkPhone.md)

