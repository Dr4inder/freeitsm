# messagingTelegramLinkPhone()

A phone number has just arrived for this chat. Decide what it means, safely.

```php
function messagingTelegramLinkPhone(
    PDO $conn,
    array $channel,
    string $chatId,
    int $linkedUserId,
    string $phone,
    string $locale = 'en',
    bool $isTest = false
): array
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 629.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$channel` | `array` |  |  |
| `$chatId` | `string` |  |  |
| `$linkedUserId` | `int` |  |  |
| `$phone` | `string` |  |  |
| `$locale` | `string` | `'en'` |  |
| `$isTest` | `bool` | `false` |  |

**Returns:** array{0:int,1:string} [the user the chat now resolves to, display name override]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 636 | `messagingTelegramLinkPhone` | **update** [messaging_identity_links](/code/tables/messaging_identity_links.md) (`phone`) |  |
| 661 | `messagingTelegramLinkPhone` | **update** [messaging_identity_links](/code/tables/messaging_identity_links.md) (`user_id`) |  |
| 669 | `messagingTelegramLinkPhone` | read [tickets](/code/tables/tickets.md), read [emails](/code/tables/emails.md) |  |
| 677 | `messagingTelegramLinkPhone` | **update** [tickets](/code/tables/tickets.md) (`user_id`) |  |
| 684 | `messagingTelegramLinkPhone` | read [tickets](/code/tables/tickets.md), read [messaging_identity_links](/code/tables/messaging_identity_links.md) |  |
| 687 | `messagingTelegramLinkPhone` | **delete** [users](/code/tables/users.md) |  |
| 705 | `messagingTelegramLinkPhone` | read [users](/code/tables/users.md) |  |
| 713 | `messagingTelegramLinkPhone` | **update** [users](/code/tables/users.md) (`mobile`) |  |

## Calls

[findOpenChannelTicket()](/code/functions/findOpenChannelTicket.md), [messagingFindUsersByPhone()](/code/functions/messagingFindUsersByPhone.md), [messagingTelegramAck()](/code/functions/messagingTelegramAck.md), [messagingTelegramAudit()](/code/functions/messagingTelegramAudit.md), [messagingTelegramIsPlaceholder()](/code/functions/messagingTelegramIsPlaceholder.md), [messagingTelegramPlaceholderEmail()](/code/functions/messagingTelegramPlaceholderEmail.md), [messagingUserLabel()](/code/functions/messagingUserLabel.md), [resolveTicketTenantForChannel()](/code/functions/resolveTicketTenantForChannel.md)

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingTelegramResolveIdentity()](/code/functions/messagingTelegramResolveIdentity.md)

