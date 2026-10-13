# checklist_templates

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `tenant_id` | `INT DEFAULT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `description` | `TEXT DEFAULT NULL` |  |
| `keywords` | `TEXT DEFAULT NULL` |  |
| `category` | `VARCHAR(100) DEFAULT 'General'` |  |
| `suggested_role` | `VARCHAR(100) DEFAULT NULL` |  |
| `scope` | `ENUM('ticket','task','both') NOT NULL DEFAULT 'both'` |  |
| `closure_mode` | `ENUM('warn','block') NOT NULL DEFAULT 'warn'` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_by_id` | `INT DEFAULT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [checklists/api.php](/code/files/checklists/api.php.md):67 |  | update | `title`, `category`, `scope`, `closure_mode`, `description`, `keywords` |  |
| [checklists/api.php](/code/files/checklists/api.php.md):70 |  | insert | `title`, `category`, `scope`, `closure_mode`, `description`, `keywords`, `created_by_id` |  |
| [checklists/api.php](/code/files/checklists/api.php.md):119 |  | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):359 | `ChecklistsService::saveLookup` | update | `category` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md) | L157, L222, L241 |  |
| [checklists/api.php](/code/files/checklists/api.php.md) | L34, L89 |  |
| [checklists/index.php](/code/files/checklists/index.php.md) | L29 |  |
| [checklists/settings/index.php](/code/files/checklists/settings/index.php.md) | L66 |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::templatesForTask L485, ChecklistsService::attachTemplateToTask L504, ChecklistsService::copyTaskChecklists L769 |  |
| [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) | WorkflowEngine::action_attach_checklist L2071 |  |

