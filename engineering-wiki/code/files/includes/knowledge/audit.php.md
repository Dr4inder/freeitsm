# includes/knowledge/audit.php

> PHP - 154 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md) | 49 | Record one thing that happened. |
| [knowledgeAuditView()](/code/functions/knowledgeAuditView.md) | 83 | Record that somebody read an article — at most once per person per day. |
| [knowledgeAuditHistory()](/code/functions/knowledgeAuditHistory.md) | 110 | The history of one object, newest first, with the names filled in. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 61 | `knowledgeAuditLog` | **insert** [knowledge_audit](/code/tables/knowledge_audit.md) (`object_type`, `object_id`, `action`, `analyst_id`, `user_id`, `detail`, `ip_address`) |  |
| 88 | `knowledgeAuditView` | read [knowledge_audit](/code/tables/knowledge_audit.md) |  |
| 114 | `knowledgeAuditHistory` | read [knowledge_audit](/code/tables/knowledge_audit.md) |  |
| 129 | `knowledgeAuditHistory` | read [analysts](/code/tables/analysts.md) |  |
| 132 | `knowledgeAuditHistory` | read [users](/code/tables/users.md) |  |

## How it hangs together

**Included by:** [api/knowledge/audit.php](/code/files/api/knowledge/audit.php.md), [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md), [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md), [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md)

