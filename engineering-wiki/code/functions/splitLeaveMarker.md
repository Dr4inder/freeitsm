# splitLeaveMarker()

Leave a visible marker in the original thread where the messages left.

Timestamped to the FIRST moved message so it sits in the gap those messages left
rather than jumping to the top of the conversation — the point is to explain the
hole, and a marker somewhere else explains nothing.

```php
function splitLeaveMarker(PDO $conn, int $ticketId, string $newNumber, array $moving): int
```

Defined in [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), line 301.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$newNumber` | `string` |  |  |
| `$moving` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 309 | `splitLeaveMarker` | **insert** [emails](/code/tables/emails.md) (`subject`, `from_address`, `from_name`, `received_datetime`, `body_content`, `body_type`, `has_attachments`, `is_read`, `ticket_id`, `direction`, `channel`, `is_initial`) |  |

## Called from

- [includes/ticket_split.php](/code/files/includes/ticket_split.php.md) - in [splitTicket()](/code/functions/splitTicket.md)

