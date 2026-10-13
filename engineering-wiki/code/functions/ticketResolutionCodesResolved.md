# ticketResolutionCodesResolved()

Resolution codes this company can see.

```php
function ticketResolutionCodesResolved(PDO $conn, ?int $tenantId, array $opts = []): array
```

Defined in [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md), line 307.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$opts` | `array` | `[]` | activeOnly — drop retired codes (default false) |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 316 | `ticketResolutionCodesResolved` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |

## Calls

[getTenantConfigRows()](/code/functions/getTenantConfigRows.md)

## Called from

- [api/tickets/get_ticket_classification.php](/code/files/api/tickets/get_ticket_classification.php.md)

