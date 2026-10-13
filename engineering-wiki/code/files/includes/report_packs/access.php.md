# includes/report_packs/access.php

> PHP - 242 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpViewer()](/code/functions/rpViewer.md) | 31 | The teams and department this analyst counts as, for matching shares. |
| [rpNormDept()](/code/functions/rpNormDept.md) | 56 |  |
| [rpShareMatchSql()](/code/functions/rpShareMatchSql.md) | 65 | SQL that matches the shares reaching this viewer, for `report_pack_shares s`. |
| [rpRole()](/code/functions/rpRole.md) | 84 | This viewer's role on a pack: 'owner', 'edit', 'view', or null (no access, or no such pack - the caller says "not found" for both, so ids cannot be probed). |
| [rpRoleAtLeast()](/code/functions/rpRoleAtLeast.md) | 105 | True if `$role` is at least `$need` ('view' < 'edit' < 'owner'). |
| [rpListPacks()](/code/functions/rpListPacks.md) | 114 | Every pack this analyst can open, newest change first, with their role on each. |
| [rpListShares()](/code/functions/rpListShares.md) | 157 | A pack's shares, with a display name for each target. Owner only. |
| [rpSaveShares()](/code/functions/rpSaveShares.md) | 191 | Replace a pack's shares with `$shares` (the whole list, as the dialog sends it). Each entry is validated against what exists; unknown targets are dropped, never stored, so a share cannot point at an id that a later analyst or team would inherit. |
| [rpKnownDepartments()](/code/functions/rpKnownDepartments.md) | 228 | The departments analysts actually have, for the share picker. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `rpViewer` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 43 | `rpViewer` | read [analysts](/code/tables/analysts.md) |  |
| 86 | `rpRole` | read [report_packs](/code/tables/report_packs.md) |  |
| 97 | `rpRole` | read [report_pack_shares](/code/tables/report_pack_shares.md) |  |
| 120 | `rpListPacks` | read [report_pack_shares](/code/tables/report_pack_shares.md), read [report_packs](/code/tables/report_packs.md), read [analysts](/code/tables/analysts.md) |  |
| 160 | `rpListShares` | read [report_pack_shares](/code/tables/report_pack_shares.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md) |  |
| 215 | `rpSaveShares` | **delete** [report_pack_shares](/code/tables/report_pack_shares.md) |  |
| 216 | `rpSaveShares` | **insert** [report_pack_shares](/code/tables/report_pack_shares.md) (`pack_id`, `target_type`, `target_id`, `target_value`, `can_edit`) |  |
| 230 | `rpKnownDepartments` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Included by:** [includes/report_packs/api_common.php](/code/files/includes/report_packs/api_common.php.md)

