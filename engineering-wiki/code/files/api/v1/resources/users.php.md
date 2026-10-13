# api/v1/resources/users.php

> API endpoint - 302 lines

FreeITSM REST API v1 — requesters (the `users` table: end users who raise tickets, distinct from analysts).

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/users.php` |
| Protected by | REST API key |
| Reads | `GET email`, `GET q` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiUserColumns()](/code/functions/apiUserColumns.md) | 13 | The columns every read of a requester selects - including the cost centre they are charged to (GH #160), once Database Verification has added it. |
| [apiUserCostCentre()](/code/functions/apiUserCostCentre.md) | 29 | `cost_centre_id` from a request body for a requester in company `$tenantId` (NULL = Default): an ACTIVE one of that company, or the one they hold. 422 otherwise. Returns [sent?, value]. |
| [apiSerializeUser()](/code/functions/apiSerializeUser.md) | 40 |  |
| [apiUsersList()](/code/functions/apiUsersList.md) | 63 | GET /users?q=&email= |
| [apiUsersGet()](/code/functions/apiUsersGet.md) | 108 | GET /users/{id} |
| [apiUsersCreate()](/code/functions/apiUsersCreate.md) | 142 | POST /users |
| [apiUsersUpdate()](/code/functions/apiUsersUpdate.md) | 206 | PATCH /users/{id} |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 17 | `apiUserColumns` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 90 | `apiUsersList` | read [users](/code/tables/users.md) |  |
| 97 | `apiUsersList` | read [users](/code/tables/users.md) |  |
| 116 | `apiUsersGet` | read [users](/code/tables/users.md) |  |
| 127 | `apiUsersGet` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 167 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |
| 174 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |
| 195 | `apiUsersCreate` | **insert** [users](/code/tables/users.md) (`email`, `username`, `display_name`, `preferred_name`, `tenant_id`, `created_at`) |  |
| 198 | `apiUsersCreate` | **update** [users](/code/tables/users.md) (`cost_centre_id`) |  |
| 200 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |
| 221 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 235 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 274 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 286 | `apiUsersUpdate` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 296 | `apiUsersUpdate` | **update** [users](/code/tables/users.md) |  |
| 298 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |

## How it hangs together

**Includes:** [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiKeyTicketFilter()](/code/functions/apiKeyTicketFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [costCentreCheck()](/code/functions/costCentreCheck.md), [costCentreReady()](/code/functions/costCentreReady.md), [costCentreRecordTenant()](/code/functions/costCentreRecordTenant.md), [resolveTenantForNewUser()](/code/functions/resolveTenantForNewUser.md)

