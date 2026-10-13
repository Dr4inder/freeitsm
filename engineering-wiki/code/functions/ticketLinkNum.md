# ticketLinkNum()

```php
function ticketLinkNum(PDO $conn, int $id): string
```

Defined in [includes/ticket_links.php](/code/files/includes/ticket_links.php.md), line 28.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 30 | `ticketLinkNum` | read [tickets](/code/tables/tickets.md) |  |

## Called from

- [includes/ticket_links.php](/code/files/includes/ticket_links.php.md) - in [ticketLinkCreate()](/code/functions/ticketLinkCreate.md), [ticketLinkRemove()](/code/functions/ticketLinkRemove.md)

