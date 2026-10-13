# includes/report_packs/blocks_software.php

> PHP - 110 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpSoftwareScope()](/code/functions/rpSoftwareScope.md) | 16 | "JOIN assets + company + system components" for inventory queries. |
| [rpSoftwareByPublisher()](/code/functions/rpSoftwareByPublisher.md) | 23 |  |
| [rpSoftwareTopApps()](/code/functions/rpSoftwareTopApps.md) | 37 |  |
| [rpSoftwareKpis()](/code/functions/rpSoftwareKpis.md) | 56 |  |
| [rpSoftwareLicences()](/code/functions/rpSoftwareLicences.md) | 79 | Licences, optionally only those renewing in the range. Licence keys are NEVER included - a report is printed, emailed and left on desks. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 20 | `rpSoftwareScope` | read [assets](/code/tables/assets.md) |  |
| 26 | `rpSoftwareByPublisher` | read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 40 | `rpSoftwareTopApps` | read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 59 | `rpSoftwareKpis` | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 64 | `rpSoftwareKpis` | read [software_licences](/code/tables/software_licences.md) |  |
| 83 | `rpSoftwareLicences` | read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## How it hangs together

**Included by:** [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md)

**Calls:** [rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpFmtDate()](/code/functions/rpFmtDate.md), [rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

