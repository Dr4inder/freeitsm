# checklists/api.php

> PHP - 121 lines

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 21 |  | read [checklist_templates](/code/tables/checklist_templates.md) |  |
| 28 |  | read [checklist_template_items](/code/tables/checklist_template_items.md) |  |
| 54 |  | **update** [checklist_templates](/code/tables/checklist_templates.md) (`title`, `category`, `scope`, `closure_mode`, `description`, `keywords`) |  |
| 57 |  | **insert** [checklist_templates](/code/tables/checklist_templates.md) (`title`, `category`, `scope`, `closure_mode`, `description`, `keywords`, `created_by_id`) |  |
| 64 |  | **insert** [checklist_categories](/code/tables/checklist_categories.md) (`name`) |  |
| 76 |  | read [checklist_templates](/code/tables/checklist_templates.md) |  |
| 78 |  | **delete** [checklist_template_items](/code/tables/checklist_template_items.md) |  |
| 81 |  | **insert** [checklist_template_items](/code/tables/checklist_template_items.md) (`template_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order`, `is_demo`) |  |
| 105 |  | **delete** [checklist_template_items](/code/tables/checklist_template_items.md) |  |
| 106 |  | **delete** [checklist_templates](/code/tables/checklist_templates.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

