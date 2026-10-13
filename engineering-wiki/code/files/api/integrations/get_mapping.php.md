# api/integrations/get_mapping.php

> API endpoint - 74 lines

The mapping for one connection, plus the local lists it maps FROM (companies, departments, ticket types, priorities) so the screen can label every row.

The local lists are read here rather than on the settings page itself because
the page is shared across providers and only needs them when the mapping
screen is opened.

## The endpoint

| | |
|---|---|
| URL | `api/integrations/get_mapping.php` |
| Protected by | Administrators only (admin_api_guard.php) |
| Reads | `GET connection_id` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [mappingList()](/code/functions/mappingList.md) | 33 | A lookup list, tolerant of a table that is not there on every install. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 53 |  | read [tenants](/code/tables/tenants.md) |  |
| 54 |  | read [departments](/code/tables/departments.md) |  |
| 62 |  | read [ticket_types](/code/tables/ticket_types.md), read [tenants](/code/tables/tenants.md) |  |
| 67 |  | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/admin_api_guard.php](/code/files/includes/admin_api_guard.php.md), [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [integrationsLoadMaps()](/code/functions/integrationsLoadMaps.md), [integrationsMapSchemaReady()](/code/functions/integrationsMapSchemaReady.md), [integrationsSchemaReady()](/code/functions/integrationsSchemaReady.md)

