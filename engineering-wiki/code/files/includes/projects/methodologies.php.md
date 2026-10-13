# includes/projects/methodologies.php

> PHP - 162 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [projectsSchemaReady()](/code/functions/projectsSchemaReady.md) | 28 | Has Database Verification created the Projects schema yet? |
| [projectColourHex()](/code/functions/projectColourHex.md) | 44 | The first colour of a project's palette key - for a dot or a chip outside the module. |
| [projectMethodologies()](/code/functions/projectMethodologies.md) | 56 | The presets. 'timebox' is the project_stages.kind used for new and open time boxes; 'single_active' allows only one active time box at a time. |
| [projectToolDefinitions()](/code/functions/projectToolDefinitions.md) | 74 | The tools a project can switch on (phase 2). A method turns a set on by default ('tools' in `projectMethodologies()`); a project can TAILOR that - PRINCE2's own "tailor to suit the project" principle - and its choices are stored as JSON in projects.tailoring ({"raci": true, "raid": false}). Switching a tool off HIDES it; nothing it holds is deleted. |
| [projectEnabledTools()](/code/functions/projectEnabledTools.md) | 89 | The tools switched on for one project: its method's defaults, then its tailoring. |
| [projectStatuses()](/code/functions/projectStatuses.md) | 100 |  |
| [projectPriorities()](/code/functions/projectPriorities.md) | 107 | Project priorities, lowest first (3.3.0). Stored as these keys; shown as projectScaleLabels('priority'). |
| [projectFinishedStatuses()](/code/functions/projectFinishedStatuses.md) | 112 |  |
| [projectHealthValues()](/code/functions/projectHealthValues.md) | 117 |  |
| [projectStageKinds()](/code/functions/projectStageKinds.md) | 122 |  |
| [projectStageStatuses()](/code/functions/projectStageStatuses.md) | 127 |  |
| [projectColours()](/code/functions/projectColours.md) | 138 | The colour a project picks for its card: a fixed palette, never free CSS, so a stored value can only ever be one of these keys. |
| [projectIcons()](/code/functions/projectIcons.md) | 158 | The icons a project can pick. Keys only - the SVG lives in assets/js/projects.js so the stored value is never markup. |

## How it hangs together

**Included by:** [api/tasks/get.php](/code/files/api/tasks/get.php.md), [api/tasks/list.php](/code/files/api/tasks/list.php.md), [includes/people.php](/code/files/includes/people.php.md), [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), [includes/services/projects.php](/code/files/includes/services/projects.php.md), [projects/help.php](/code/files/projects/help.php.md), [projects/tutorial.php](/code/files/projects/tutorial.php.md)

