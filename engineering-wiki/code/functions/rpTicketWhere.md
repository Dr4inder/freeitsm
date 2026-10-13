# rpTicketWhere()

WHERE for "tickets in this period, for this company, not trashed".

```php
function rpTicketWhere(PDO $conn, int $analystId, string $basis, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 41.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$basis` | `string` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** array{0:string,1:array}

## Calls

[rpTenantClause()](/code/functions/rpTenantClause.md)

## Called from

- [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md) - in [rpTicketsBreakdown()](/code/functions/rpTicketsBreakdown.md), [rpTicketsTrend()](/code/functions/rpTicketsTrend.md), [rpTicketsKpis()](/code/functions/rpTicketsKpis.md), [rpTicketsList()](/code/functions/rpTicketsList.md)

