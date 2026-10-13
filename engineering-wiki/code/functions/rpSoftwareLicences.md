# rpSoftwareLicences()

Licences, optionally only those renewing in the range. Licence keys are NEVER included - a report is printed, emailed and left on desks.

```php
function rpSoftwareLicences(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md), line 85.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 89 | `rpSoftwareLicences` | read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## Calls

[rpFmtDate()](/code/functions/rpFmtDate.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

