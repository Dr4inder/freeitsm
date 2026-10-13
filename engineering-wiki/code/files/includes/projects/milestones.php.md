# includes/projects/milestones.php

> PHP - 86 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [projectMilestonesReady()](/code/functions/projectMilestonesReady.md) | 22 | Has Database Verification created the table? Everything here is quiet before it. |
| [projectMilestoneState()](/code/functions/projectMilestoneState.md) | 33 | done \| missed \| due - see the header. |
| [projectMilestones()](/code/functions/projectMilestones.md) | 40 | One project's milestones in date order, each with its state, for the project page. |
| [projectMilestoneStats()](/code/functions/projectMilestoneStats.md) | 64 | Per project: how many milestones are missed, and the next one still to come ({id, name, due_date} or null) - for health and the portfolio card. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 26 | `projectMilestonesReady` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 43 | `projectMilestones` | read [project_milestones](/code/tables/project_milestones.md), read [project_stages](/code/tables/project_stages.md), read [analysts](/code/tables/analysts.md) |  |
| 70 | `projectMilestoneStats` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 75 | `projectMilestoneStats` | read [project_milestones](/code/tables/project_milestones.md) |  |

## How it hangs together

**Included by:** [api/projects/portfolio_charts.php](/code/files/api/projects/portfolio_charts.php.md), [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md), [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

