# webchatRateLimitSend()

Cap inbound messages per conversation per minute. Exits (429) on breach.

```php
function webchatRateLimitSend(PDO $conn, int $ticketId): void
```

Defined in [includes/webchat/public.php](/code/files/includes/webchat/public.php.md), line 161.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 168 | `webchatRateLimitSend` | read [emails](/code/tables/emails.md) |  |

## Calls

[webchatFail()](/code/functions/webchatFail.md)

## Called from

- [api/webchat/send.php](/code/files/api/webchat/send.php.md)

