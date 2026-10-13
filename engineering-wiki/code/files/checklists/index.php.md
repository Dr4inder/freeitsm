# checklists/index.php

> PHP - 339 lines

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 22 |  | read [checklist_templates](/code/tables/checklist_templates.md) |  |
| 23 |  | read [checklist_template_items](/code/tables/checklist_template_items.md) |  |
| 33 |  | read [checklist_categories](/code/tables/checklist_categories.md) |  |
| 45 |  | read [checklist_roles](/code/tables/checklist_roles.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/i18n.php](/code/files/includes/i18n.php.md), [includes/theme.php](/code/files/includes/theme.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md), [checklists/includes/header.php](/code/files/checklists/includes/header.php.md)

**Loads scripts:** [checklists/search_scoring.js](/code/files/checklists/search_scoring.js.md), [assets/js/mobile.js](/code/files/assets/js/mobile.js.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [pageTitle()](/code/functions/pageTitle.md), [requireModuleAccess()](/code/functions/requireModuleAccess.md), [t()](/code/functions/t.md)

