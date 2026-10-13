# includes/report_packs/blocks_assets.php

> PHP - 120 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpAssetsBreakdown()](/code/functions/rpAssetsBreakdown.md) | 31 |  |
| [rpAssetsKpis()](/code/functions/rpAssetsKpis.md) | 43 |  |
| [rpAssetsExpiring()](/code/functions/rpAssetsExpiring.md) | 62 | Assets whose warranty and/or lease ends inside the range. |
| [rpIntuneBreakdown()](/code/functions/rpIntuneBreakdown.md) | 94 |  |
| [rpIntuneKpis()](/code/functions/rpIntuneKpis.md) | 103 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 14 |  | read [asset_types](/code/tables/asset_types.md) |  |
| 15 |  | read [asset_status_types](/code/tables/asset_status_types.md) |  |
| 19 |  | read [asset_locations](/code/tables/asset_locations.md) |  |
| 35 | `rpAssetsBreakdown` | read [assets](/code/tables/assets.md) |  |
| 46 | `rpAssetsKpis` | read [assets](/code/tables/assets.md) |  |
| 68 | `rpAssetsExpiring` | read [assets](/code/tables/assets.md) |  |
| 97 | `rpIntuneBreakdown` | read [intune_devices](/code/tables/intune_devices.md) |  |
| 105 | `rpIntuneKpis` | read [intune_devices](/code/tables/intune_devices.md) |  |

## How it hangs together

**Included by:** [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md)

**Calls:** [rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpFmtDate()](/code/functions/rpFmtDate.md), [rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

