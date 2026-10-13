# ticketLinkAudit()

```php
function ticketLinkAudit(
    PDO $conn,
    int $ticketId,
    int $analystId,
    string $field,
    string $newVal
): void
```

Defined in [includes/ticket_links.php](/code/files/includes/ticket_links.php.md), line 35.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$field` | `string` |  |  |
| `$newVal` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `ticketLinkAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Called from

- [includes/ticket_links.php](/code/files/includes/ticket_links.php.md) - in [ticketLinkCreate()](/code/functions/ticketLinkCreate.md), [ticketLinkRemove()](/code/functions/ticketLinkRemove.md)

