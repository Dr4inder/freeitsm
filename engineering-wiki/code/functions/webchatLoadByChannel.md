# webchatLoadByChannel()

Load a widget row joined to its channel, keyed by channel id. Null if missing.

```php
function webchatLoadByChannel(PDO $conn, int $channelId): ?array
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 76.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$channelId` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 80 | `webchatLoadByChannel` | read [webchat_widgets](/code/tables/webchat_widgets.md), read [messaging_channels](/code/tables/messaging_channels.md) |  |

*Nothing calls this function by name.*

