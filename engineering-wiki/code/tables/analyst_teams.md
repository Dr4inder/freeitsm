# analyst_teams

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `analyst_id` | `INT NOT NULL` |  |
| `team_id` | `INT NOT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/debug-tools/D001_demo_core_import.php](/code/files/api/system/debug-tools/D001_demo_core_import.php.md):360 |  | insert | `analyst_id`, `team_id` |  |
| [api/tickets/save_analyst_teams.php](/code/files/api/tickets/save_analyst_teams.php.md):37 |  | delete |  |  |
| [api/tickets/save_analyst_teams.php](/code/files/api/tickets/save_analyst_teams.php.md):43 |  | insert | `analyst_id`, `team_id` |  |
| [api/tickets/save_team_analysts.php](/code/files/api/tickets/save_team_analysts.php.md):44 |  | delete |  |  |
| [api/tickets/save_team_analysts.php](/code/files/api/tickets/save_team_analysts.php.md):50 |  | insert | `analyst_id`, `team_id` |  |
| [includes/sso_claims.php](/code/files/includes/sso_claims.php.md):216 | `ssoApplyGroupAccess` | insert | `analyst_id`, `team_id`, `created_datetime` |  |
| [includes/sso_claims.php](/code/files/includes/sso_claims.php.md):217 | `ssoApplyGroupAccess` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/get_effective_module_access.php](/code/files/api/system/get_effective_module_access.php.md) | L35 |  |
| [api/tickets/get_analyst_teams.php](/code/files/api/tickets/get_analyst_teams.php.md) | L28 |  |
| [api/tickets/get_analysts.php](/code/files/api/tickets/get_analysts.php.md) | L46, L49 |  |
| [api/tickets/get_my_departments.php](/code/files/api/tickets/get_my_departments.php.md) | L27, L44 |  |
| [api/tickets/get_team_analysts.php](/code/files/api/tickets/get_team_analysts.php.md) | L28 |  |
| [api/tickets/get_ticket_counts.php](/code/files/api/tickets/get_ticket_counts.php.md) | L28, L72 |  |
| [includes/analyst_signin.php](/code/files/includes/analyst_signin.php.md) | analystSignInTeamMethods L73, analystSignInTeamMemberIds L175 |  |
| [includes/files/acl.php](/code/files/includes/files/acl.php.md) | FilesAcl::teamIds L112 |  |
| [includes/functions.php](/code/files/includes/functions.php.md) | getAnalystAllowedModules L153 |  |
| [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) | knowledgeViewerPrincipals L673 |  |
| [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) | notificationsAudienceFor L192 |  |
| [includes/projects/settings.php](/code/files/includes/projects/settings.php.md) | projectIsTeam L413 |  |
| [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md) | projectVisibleSql L72 |  |
| [includes/rbac.php](/code/files/includes/rbac.php.md) | getAnalystCapabilities L63 |  |
| [includes/report_packs/access.php](/code/files/includes/report_packs/access.php.md) | rpViewer L38 |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md) | ProjectReportsService::recipients L239 |  |
| [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) | sla_resolve_recipients L248 |  |
| [includes/sso_claims.php](/code/files/includes/sso_claims.php.md) | ssoApplyGroupAccess L213 |  |
| [includes/table_views.php](/code/files/includes/table_views.php.md) | tableViewTeamIds L28 |  |
| [includes/tenancy.php](/code/files/includes/tenancy.php.md) | getAccessibleTenantIds L214, getAccessibleTenantIds L228 |  |
| [includes/warroom.php](/code/files/includes/warroom.php.md) | warRoomEnsureChannels L96, warRoomChannelList L149, warRoomCanAccessChannel L243, warRoomChannelAudience L747, warRoomMyMentions L815, warRoomSearch L1005 ... |  |
| [includes/watchtower_settings.php](/code/files/includes/watchtower_settings.php.md) | wtTeamAnalystIds L164, wtMorningCheckScope L203 |  |
| [morning-checks/index.php](/code/files/morning-checks/index.php.md) | L43 |  |

