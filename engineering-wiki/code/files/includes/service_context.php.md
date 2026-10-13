# includes/service_context.php

> PHP - 152 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [serviceErrorHttpStatus()](/code/functions/serviceErrorHttpStatus.md) | 141 | Map a ServiceError kind to the HTTP status the API adapter should return. |

## Classes

- [ActorContext](/code/classes/ActorContext.md) (class, line 20) - Who is acting, and what they may see — the only auth-derived facts a service needs. Both adapters produce the same shape from their own transport.
- [ServiceError](/code/classes/ServiceError.md) (class, line 125) - A business-rule failure raised by a service. `$kind` drives the HTTP status the API adapter emits; `$code` + the message are passed through verbatim so the API's existing error bodies stay byte-identical.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 110 | `ActorContext::sessionCompanyScope` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Included by:** [api/assets/save_asset_tag.php](/code/files/api/assets/save_asset_tag.php.md), [api/cmdb/create_impact_diagram.php](/code/files/api/cmdb/create_impact_diagram.php.md), [api/tickets/save_mandatory_fields_settings.php](/code/files/api/tickets/save_mandatory_fields_settings.php.md), [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md), [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/domains/links.php](/code/files/includes/domains/links.php.md), [includes/leases.php](/code/files/includes/leases.php.md), [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/analysts.php](/code/files/includes/services/analysts.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md), [includes/services/asset_fields.php](/code/files/includes/services/asset_fields.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md), [includes/services/asset_tags.php](/code/files/includes/services/asset_tags.php.md), [includes/services/calendar.php](/code/files/includes/services/calendar.php.md), [includes/services/changes.php](/code/files/includes/services/changes.php.md), [includes/services/checklists.php](/code/files/includes/services/checklists.php.md), [includes/services/cmdb.php](/code/files/includes/services/cmdb.php.md), [includes/services/contracts.php](/code/files/includes/services/contracts.php.md), [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md), [includes/services/forms.php](/code/files/includes/services/forms.php.md), [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md), [includes/services/morning_checks.php](/code/files/includes/services/morning_checks.php.md), [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md), [includes/services/notifications.php](/code/files/includes/services/notifications.php.md), [includes/services/problems.php](/code/files/includes/services/problems.php.md), [includes/services/projects.php](/code/files/includes/services/projects.php.md), [includes/services/service_status.php](/code/files/includes/services/service_status.php.md), [includes/services/software.php](/code/files/includes/services/software.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [includes/sso_claims.php](/code/files/includes/sso_claims.php.md), [includes/typed_fields.php](/code/files/includes/typed_fields.php.md), [tickets/settings/index.php](/code/files/tickets/settings/index.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Calls:** [getAccessibleTenantIds()](/code/functions/getAccessibleTenantIds.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

