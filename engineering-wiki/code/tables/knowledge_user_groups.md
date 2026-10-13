# knowledge_user_groups

── User groups ───────────────────────────────────────────────────────── NOT lms_learning_groups. The driving case is ad hoc and short-lived — three engineers on site for a week needing one folder — and routing that through the LMS to grant a document permission would be daft. `users` has no grouping of any kind today, so a table was needed regardless.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `name` | `VARCHAR(100) NOT NULL` |  |
| `description` | `VARCHAR(500) NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md):285 | `handleCreate` | insert | `name`, `description`, `created_by_id`, `created_datetime`, `updated_datetime` |  |
| [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md):313 | `handleUpdate` | update | `name`, `description`, `updated_datetime` |  |
| [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md):334 | `handleDelete` | update | `is_active`, `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/forms/audience.php](/code/files/api/forms/audience.php.md) | L62 |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md) | handleSearch L353 |  |
| [api/lms/assignment_targets.php](/code/files/api/lms/assignment_targets.php.md) | L95 |  |
| [api/lms/assignments.php](/code/files/api/lms/assignments.php.md) | L48 |  |
| [api/lms/progress.php](/code/files/api/lms/progress.php.md) | L115 |  |
| [api/tickets/manager_access.php](/code/files/api/tickets/manager_access.php.md) | maState L96, L212, L266, L269, L322 |  |
| [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md) | handleList L99, handleGet L136, handleCreate L272, handleUpdate L305, handleAddMember L361 |  |
| [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) | knowledgeViewerPrincipals L695 |  |
| [includes/lms_access.php](/code/files/includes/lms_access.php.md) | lmsUserGroupsAvailable L183, lmsAssignmentReachSql L236, lmsAssignedLearnersSql L493, lmsAssignmentTargetProblem L562 |  |
| [includes/managers.php](/code/files/includes/managers.php.md) | managerGrantMembers L189 |  |
| [includes/services/forms.php](/code/files/includes/services/forms.php.md) | FormsService::setFormAudiences L2075, FormsService::portalAudienceSql L2119 |  |

