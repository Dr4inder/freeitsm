# asset_handover_templates

Optional grouping + routing for the morning round (discussion #64). ⚠️ Assignment is guidance, never a lock — nothing in the save path reads it, so anyone can still complete anyone's check. Handover document templates (discussion #56).

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `name` | `VARCHAR(120) NOT NULL` |  |
| `blocks` | `LONGTEXT NULL` |  |
| `is_default` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md):312 | `HandoverTemplates::save` | update | `name`, `blocks`, `is_active`, `updated_datetime` |  |
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md):318 | `HandoverTemplates::save` | insert | `name`, `blocks`, `is_active`, `created_datetime`, `updated_datetime` |  |
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md):333 | `HandoverTemplates::makeDefault` | update | `is_default` |  |
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md):334 | `HandoverTemplates::makeDefault` | update | `is_default`, `is_active` |  |
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md):339 | `HandoverTemplates::delete` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md) | HandoverTemplates::listAll L235, HandoverTemplates::load L252, HandoverTemplates::effective L285 |  |

