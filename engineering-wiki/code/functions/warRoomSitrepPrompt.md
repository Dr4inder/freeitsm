# warRoomSitrepPrompt()

The prompt for the situation report.

🔑 Written for ONE reader: the service delivery manager who has to send the
next update to the business in ten minutes and cannot read four hundred
messages first. That is why it asks for what changed, what is still unknown and
what the business would want told — and why it is told to say when the chat
does not support a conclusion. A summary that invents a cause reads exactly like
one that found a cause, and it goes out to the whole company under somebody's
name.

```php
function warRoomSitrepPrompt(array $lines, string $sinceLabel): string
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 1331.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$lines` | `array` |  |  |
| `$sinceLabel` | `string` |  |  |

**Returns:** `string`

## Called from

- [api/war-room/sitrep.php](/code/files/api/war-room/sitrep.php.md)

