# simCleanup()

Remove everything a simulation created (ticket, its messages, the placeholder user) and restore the channel stamp.

```php
function simCleanup(
    PDO $conn,
    ?int $ticketId,
    string $sender,
    string $channelType,
    int $channelId,
    $prevStamp
): void
```

Defined in [api/messaging/test_channel.php](/code/files/api/messaging/test_channel.php.md), line 202.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `?int` |  |  |
| `$sender` | `string` |  |  |
| `$channelType` | `string` |  |  |
| `$channelId` | `int` |  |  |
| `$prevStamp` |  |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 206 | `simCleanup` | **delete** [emails](/code/tables/emails.md) |  |
| 207 | `simCleanup` | **delete** [tickets](/code/tables/tickets.md) |  |
| 213 | `simCleanup` | read [users](/code/tables/users.md) |  |
| 217 | `simCleanup` | read [tickets](/code/tables/tickets.md) |  |
| 220 | `simCleanup` | **delete** [users](/code/tables/users.md) |  |
| 224 | `simCleanup` | **update** [messaging_channels](/code/tables/messaging_channels.md) (`last_inbound_datetime`) |  |

## Calls

[normaliseChannelIdentifier()](/code/functions/normaliseChannelIdentifier.md)

## Called from

- [api/messaging/test_channel.php](/code/files/api/messaging/test_channel.php.md) - in [testSimulation()](/code/functions/testSimulation.md)

