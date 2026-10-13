# includes/report_packs/blocks_software.php

> PHP - 116 lines

Report Packs: Software blocks.

Counted the way the Software dashboard counts - machines (DISTINCT host), so an
application installed twice on one PC counts once, and publisher NULL and ''
both read "Not recorded". The inventory is a snapshot of NOW: the date range
does not apply to it, and the blocks say so rather than pretend.

⚠️ One deliberate difference from the dashboard: these are scoped to the pack's
COMPANY, through the machine each install is on (software_inventory_detail.host_id
is assets.id). The Software dashboard itself counts every company's machines.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpSoftwareScope()](/code/functions/rpSoftwareScope.md) | 16 | "JOIN assets + company + system components" for inventory queries. |
| [rpSoftwareByPublisher()](/code/functions/rpSoftwareByPublisher.md) | 24 | Software block: a chart of how many machines have software from each publisher. A snapshot of today. |
| [rpSoftwareTopApps()](/code/functions/rpSoftwareTopApps.md) | 39 | Software block: a chart of the most installed applications, by number of machines. A snapshot of today. |
| [rpSoftwareKpis()](/code/functions/rpSoftwareKpis.md) | 62 | Software block: KPI tiles - applications, machines and installs in the inventory, and licence renewals in the period. |
| [rpSoftwareLicences()](/code/functions/rpSoftwareLicences.md) | 85 | Licences, optionally only those renewing in the range. Licence keys are NEVER included - a report is printed, emailed and left on desks. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 20 | `rpSoftwareScope` | read [assets](/code/tables/assets.md) |  |
| 27 | `rpSoftwareByPublisher` | read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 42 | `rpSoftwareTopApps` | read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 65 | `rpSoftwareKpis` | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 70 | `rpSoftwareKpis` | read [software_licences](/code/tables/software_licences.md) |  |
| 89 | `rpSoftwareLicences` | read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## How it hangs together

**Included by:** [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md)

**Calls:** [rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpFmtDate()](/code/functions/rpFmtDate.md), [rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

