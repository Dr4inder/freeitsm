# warRoomTranscriptSince()

The transcript to summarise: everything said in channels this analyst can see since a given moment.

Scoped by the same rule as everything else, so a service delivery manager's
summary can never quote a conversation they are not entitled to read — which
would be a novel way to leak a DM.

```php
function warRoomTranscriptSince(
    PDO $conn,
    int $analystId,
    string $sinceUtc,
    ?int $channelId = null,
    int $maxMessages = 400
): array
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 1267.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$sinceUtc` | `string` |  | 'Y-m-d H:i:s' in UTC |
| `$channelId` | `?int` | `null` |  |
| `$maxMessages` | `int` | `400` |  |

**Returns:** array{lines:string[],messages:int,channels:int}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1277 | `warRoomTranscriptSince` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md) |  |
| 1291 | `warRoomTranscriptSince` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 1295 | `warRoomTranscriptSince` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |

## Calls

[warRoomChannelName()](/code/functions/warRoomChannelName.md)

## Called from

- [api/war-room/sitrep.php](/code/files/api/war-room/sitrep.php.md)

