# getWatchtowerData()

`$analystId` is optional and only used to scope the Knowledge card to the company the analyst has switched to. Omitted (or 0) = unscoped, which is the behaviour every other card on this dashboard still has.

```php
function getWatchtowerData($conn, $analystId = 0, $scope = WT_SCOPE_ALL)
```

Defined in [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md), line 17.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` |  | `0` |  |
| `$scope` |  | `WT_SCOPE_ALL` |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 166 | `getWatchtowerData` | read [ticket_statuses](/code/tables/ticket_statuses.md), read [tickets](/code/tables/tickets.md) |  |
| 193 | `getWatchtowerData` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 198 | `getWatchtowerData` | read [tickets](/code/tables/tickets.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 211 | `getWatchtowerData` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 213 | `getWatchtowerData` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 226 | `getWatchtowerData` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 239 | `getWatchtowerData` | read [system_settings](/code/tables/system_settings.md) |  |
| 246 | `getWatchtowerData` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_audit](/code/tables/ticket_audit.md) |  |
| 288 | `getWatchtowerData` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 312 | `getWatchtowerData` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 325 | `getWatchtowerData` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 346 | `getWatchtowerData` | read [change_statuses](/code/tables/change_statuses.md), read [changes](/code/tables/changes.md) |  |
| 373 | `getWatchtowerData` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 396 | `getWatchtowerData` | read [calendar_events](/code/tables/calendar_events.md) |  |
| 406 | `getWatchtowerData` | read [calendar_events](/code/tables/calendar_events.md) |  |
| 432 | `getWatchtowerData` | read [status_services](/code/tables/status_services.md), read [status_incident_services](/code/tables/status_incident_services.md), read [status_incidents](/code/tables/status_incidents.md), read [service_impact_levels](/code/tables/service_impact_levels.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 465 | `getWatchtowerData` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 481 | `getWatchtowerData` | read [contracts](/code/tables/contracts.md) |  |
| 528 | `getWatchtowerData` | read [system_settings](/code/tables/system_settings.md) |  |
| 534 | `getWatchtowerData` | read [software_licences](/code/tables/software_licences.md) |  |
| 538 | `getWatchtowerData` | read [software_licences](/code/tables/software_licences.md) |  |
| 544 | `getWatchtowerData` | read [software_licences](/code/tables/software_licences.md) |  |
| 556 | `getWatchtowerData` | read [software_licences](/code/tables/software_licences.md) |  |
| 607 | `getWatchtowerData` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 641 | `getWatchtowerData` | read [domain_status_services](/code/tables/domain_status_services.md), read [domains](/code/tables/domains.md), read [status_services](/code/tables/status_services.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 685 | `getWatchtowerData` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 696 | `getWatchtowerData` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 710 | `getWatchtowerData` | read [assets](/code/tables/assets.md) |  |
| 713 | `getWatchtowerData` | read [assets](/code/tables/assets.md) |  |
| 724 | `getWatchtowerData` | read [system_settings](/code/tables/system_settings.md) |  |
| 732 | `getWatchtowerData` | read [assets](/code/tables/assets.md) |  |
| 750 | `getWatchtowerData` | read [system_settings](/code/tables/system_settings.md) |  |
| 761 | `getWatchtowerData` | read [assets](/code/tables/assets.md) |  |
| 783 | `getWatchtowerData` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 793 | `getWatchtowerData` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 810 | `getWatchtowerData` | read [task_statuses](/code/tables/task_statuses.md), read [tasks](/code/tables/tasks.md) |  |
| 860 | `getWatchtowerData` | read [projects](/code/tables/projects.md) |  |
| 879 | `getWatchtowerData` | read [project_stages](/code/tables/project_stages.md) |  |
| 886 | `getWatchtowerData` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 918 | `getWatchtowerData` | read [workflow_executions](/code/tables/workflow_executions.md) |  |
| 923 | `getWatchtowerData` | read [workflow_executions](/code/tables/workflow_executions.md) |  |
| 931 | `getWatchtowerData` | read [workflow_executions](/code/tables/workflow_executions.md), read [workflows](/code/tables/workflows.md) |  |
| 949 | `getWatchtowerData` | read [webhook_deliveries](/code/tables/webhook_deliveries.md) |  |

## Calls

[activeTenantFilter()](/code/functions/activeTenantFilter.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [domainSettings()](/code/functions/domainSettings.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [leaseGoneBackSql()](/code/functions/leaseGoneBackSql.md), [leaseReady()](/code/functions/leaseReady.md), [naive_now()](/code/functions/naive_now.md), [naive_today_sql()](/code/functions/naive_today_sql.md), [projectDecorate()](/code/functions/projectDecorate.md), [projectExceptionColumns()](/code/functions/projectExceptionColumns.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectTaskStats()](/code/functions/projectTaskStats.md), [projectVisibleSql()](/code/functions/projectVisibleSql.md), [statusPlannedDue()](/code/functions/statusPlannedDue.md), [wtIdListSql()](/code/functions/wtIdListSql.md), [wtItemMembers()](/code/functions/wtItemMembers.md), [wtMorningCheckScope()](/code/functions/wtMorningCheckScope.md), [wtScopeClause()](/code/functions/wtScopeClause.md), [wtScopeIsValid()](/code/functions/wtScopeIsValid.md), [wtVisibleCards()](/code/functions/wtVisibleCards.md)

## Called from

- [api/watchtower/get_dashboard.php](/code/files/api/watchtower/get_dashboard.php.md)
- [api/watchtower/get_dashboard_ext.php](/code/files/api/watchtower/get_dashboard_ext.php.md)

