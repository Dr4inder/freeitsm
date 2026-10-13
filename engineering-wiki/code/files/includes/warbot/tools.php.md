# includes/warbot/tools.php

> PHP - 999 lines

Warbot's tools — the registry.

🔑 THIS FILE IS THE PRODUCT, NOT THE BOT. Each tool is declared once: a name, a
description the model reads, a JSON schema, the capability required to run it,
and a plain PHP handler. Warbot is one consumer. An MCP server is a second one,
and it is a thin adapter over this array rather than a rewrite — which is why
the registry came first and the protocol later.

🔑 THE HANDLERS NEED NO INTERNET. That is the whole design. The war room exists
for the day the internet is down, so a bot whose every answer requires a remote
model would be useless in exactly the situation it was built for. Only the
MODEL needs the network; the HANDS are local SQL. When the provider cannot be
reached, Warbot falls back to slash commands that run these same handlers
directly — see warbot.php. Degraded, but not dead.

⚠️ READ-ONLY, ALL OF THEM. Warbot reads chat, so anybody in the room can type
instructions at it, and the moment it reads ticket content a customer can plant
instructions in an email. Read-only makes prompt injection embarrassing rather
than dangerous. Ed was already wary of letting the CMDB graph take actions;
the same instinct applies harder to something with a chat box.

⚠️ WHAT THESE MAY RETURN, AND WHY IT IS NARROW. Warbot answers IN A CHANNEL, so
every member sees the reply. That makes the audience for any answer "everyone
in this room", not "the person who asked". So these return OPERATIONAL facts —
counts, states, names of services, hostnames, what changed — and deliberately
NOT ticket bodies, requester details, notes or anything else that belongs to a
person. Anything of that kind needs a one-to-one conversation, which is
outstanding work rather than an oversight.

⚠️ EVERY COLUMN NAME BELOW WAS READ OUT OF information_schema, NOT REMEMBERED.
Four of five guessed column names were wrong the last time this was done from
memory (see the Forms lookup fields work), and a wrong column here reads as
"no results" rather than as an error — the failure mode is a bot that
confidently says nothing is wrong.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [warbotTools()](/code/functions/warbotTools.md) | 51 | The tool registry: every read-only tool Warbot and the MCP server can call, keyed by name, each with the description the model reads, its JSON schema, the capability needed to run it (null = War Room access is enough) and the handler that answers it. |
| [warbotToolAllowed()](/code/functions/warbotToolAllowed.md) | 338 | May this analyst use this tool? The capability, and - for a tool that names one (3.3.0, the Projects tools) - access to the module whose data it reads. The older tools name no module and are unchanged: whether the war room is install-wide is the open question in `warbotToolSearchKnowledge()` below. |
| [warbotToolsFor()](/code/functions/warbotToolsFor.md) | 351 | The tools this analyst may actually use, in the shape aiProviderChatTools wants. A capability they lack means the tool is not OFFERED at all, rather than offered and then refused — a model told about a tool it cannot use will keep reaching for it and narrate the failure to the room. |
| [warbotRunTool()](/code/functions/warbotRunTool.md) | 366 | Run one tool. NEVER throws — a failure is returned as words, because "the CMDB lookup failed" is something the model can usefully tell the room, whereas an exception here would lose the whole answer. |
| [warbotToolOpenIncidents()](/code/functions/warbotToolOpenIncidents.md) | 390 | open_incidents: the count of open tickets (optionally at one priority by name) and the newest few, by number, priority, status, subject and assignee. A confidential ticket's subject is withheld by `ticketAiSubjectSql()`. |
| [warbotToolServiceStatus()](/code/functions/warbotToolServiceStatus.md) | 435 | service_status: the active Service Status services and up to ten open service-status incidents, with the services each affects and its latest note. |
| [warbotToolRecentChanges()](/code/functions/warbotToolRecentChanges.md) | 472 | recent_changes: up to 20 changes whose work or outage window started in the last N days (default 2, max 30), with state and owner. |
| [warbotToolOnCall()](/code/functions/warbotToolOnCall.md) | 507 | on_call: who is on call on a date (today in UTC by default) and everyone rostered that day with their shift times, from the ticket rota. |
| [warbotToolAssetLookup()](/code/functions/warbotToolAssetLookup.md) | 539 | asset_lookup: up to eight assets whose hostname, asset tag or service tag contains the query, with type, status, OS, location, last user and last seen. |
| [warbotToolImpactOf()](/code/functions/warbotToolImpactOf.md) | 576 | impact_of: the first CMDB object whose name matches, and everything related to it one hop away in either direction, worded with the relationship's verb. Not the full blast radius - that walk stays in the CMDB module. |
| [warbotLike()](/code/functions/warbotLike.md) | 619 | Escape the LIKE wildcards themselves, or a search for "50%" matches everything. |
| [warbotToolKnownErrors()](/code/functions/warbotToolKnownErrors.md) | 625 | known_errors: up to six problem records matching the query in title, description, root cause or workaround - known errors first, workaround quoted. |
| [warbotToolTicketSpike()](/code/functions/warbotToolTicketSpike.md) | 666 | ticket_spike: tickets raised in the last N minutes against the average for the same time window over the previous seven days, calling three times the usual rate a spike, plus the newest subjects. |
| [warbotContractScope()](/code/functions/warbotContractScope.md) | 724 | `contractVisibilitySql()` with its company ids written in: these queries bind NAMED parameters, which cannot be mixed with its "?" ones. Every value is a company id, cast to int, so writing them in cannot inject anything. |
| [warbotToolSupplierContact()](/code/functions/warbotToolSupplierContact.md) | 739 | supplier_contact: up to three suppliers matching by name or contract title, each with its latest contracts (only in companies the analyst can reach) and its active contacts' phone numbers and email. |
| [warbotToolMorningChecks()](/code/functions/warbotToolMorningChecks.md) | 806 | morning_checks: the morning check results for a date (today in UTC by default), listing the ones that are not clear, or the first few when all are. |
| [warbotToolSearchChat()](/code/functions/warbotToolSearchChat.md) | 845 | search_chat: up to eight War Room messages matching the query, through `warRoomSearch()` so only channels the asker can read are searched. |
| [warbotToolRelatedTickets()](/code/functions/warbotToolRelatedTickets.md) | 865 | related_tickets: the tickets linked to a ticket number, with the link type, direction and each one's status. |
| [warbotToolSearchKnowledge()](/code/functions/warbotToolSearchKnowledge.md) | 900 | search_knowledge: up to eight live Knowledge article titles matching the query that the asking analyst may see - titles only, most viewed first. |
| [warbotProjectScope()](/code/functions/warbotProjectScope.md) | 944 | The asking analyst's projects: their active company, or every company they can see under "All". |
| [warbotProjectAnswer()](/code/functions/warbotProjectAnswer.md) | 955 | A ServiceError (no such project, several match) is an answer to give the room, not a failure. |
| [warbotToolListProjects()](/code/functions/warbotToolListProjects.md) | 965 | list_projects: the projects the asker may see, ten by default, via `projectAssistList()`. |
| [warbotToolProjectOverview()](/code/functions/warbotToolProjectOverview.md) | 973 | project_overview: one project's overview via `projectAssistOverview()`, scoped to the projects the asker may see. |
| [warbotToolProjectRaid()](/code/functions/warbotToolProjectRaid.md) | 980 | project_raid: one project's RAID log via `projectAssistRaid()`, scoped to the projects the asker may see. |
| [warbotToolProjectTasks()](/code/functions/warbotToolProjectTasks.md) | 987 | project_tasks: one project's tasks via `projectAssistTasks()`, scoped to the projects the asker may see. |
| [warbotToolProjectDates()](/code/functions/warbotToolProjectDates.md) | 994 | project_dates: one project's key dates via `projectAssistDates()`, scoped to the projects the asker may see. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 403 | `warbotToolOpenIncidents` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [analysts](/code/tables/analysts.md) |  |
| 415 | `warbotToolOpenIncidents` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 438 | `warbotToolServiceStatus` | read [status_services](/code/tables/status_services.md) |  |
| 445 | `warbotToolServiceStatus` | read [status_incident_services](/code/tables/status_incident_services.md), read [status_services](/code/tables/status_services.md), read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 479 | `warbotToolRecentChanges` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md), read [analysts](/code/tables/analysts.md) |  |
| 513 | `warbotToolOnCall` | read [ticket_rota_entries](/code/tables/ticket_rota_entries.md), read [analysts](/code/tables/analysts.md), read [ticket_rota_shifts](/code/tables/ticket_rota_shifts.md) |  |
| 546 | `warbotToolAssetLookup` | read [assets](/code/tables/assets.md), read [asset_types](/code/tables/asset_types.md), read [asset_status_types](/code/tables/asset_status_types.md), read [asset_locations](/code/tables/asset_locations.md) |  |
| 582 | `warbotToolImpactOf` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 595 | `warbotToolImpactOf` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md), read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 632 | `warbotToolKnownErrors` | read [problem_tickets](/code/tables/problem_tickets.md), read [problems](/code/tables/problems.md), read [problem_statuses](/code/tables/problem_statuses.md), read [analysts](/code/tables/analysts.md) |  |
| 671 | `warbotToolTicketSpike` | read [tickets](/code/tables/tickets.md) |  |
| 684 | `warbotToolTicketSpike` | read [tickets](/code/tables/tickets.md) |  |
| 707 | `warbotToolTicketSpike` | read [tickets](/code/tables/tickets.md) |  |
| 749 | `warbotToolSupplierContact` | read [suppliers](/code/tables/suppliers.md), read [contracts](/code/tables/contracts.md) |  |
| 766 | `warbotToolSupplierContact` | read [contracts](/code/tables/contracts.md), read [contract_statuses](/code/tables/contract_statuses.md) |  |
| 779 | `warbotToolSupplierContact` | read [contacts](/code/tables/contacts.md) |  |
| 871 | `warbotToolRelatedTickets` | read [tickets](/code/tables/tickets.md) |  |
| 879 | `warbotToolRelatedTickets` | read [ticket_links](/code/tables/ticket_links.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 923 | `warbotToolSearchKnowledge` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## How it hangs together

**Includes:** [includes/capabilities.php](/code/files/includes/capabilities.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/warroom.php](/code/files/includes/warroom.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md)

**Included by:** [api/system/debug-tools/D008_war_room.php](/code/files/api/system/debug-tools/D008_war_room.php.md), [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), [includes/warbot/warbot.php](/code/files/includes/warbot/warbot.php.md)

**Calls:** [activeTenantReadFilter()](/code/functions/activeTenantReadFilter.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [analystHasCapability()](/code/functions/analystHasCapability.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [projectAssistDates()](/code/functions/projectAssistDates.md), [projectAssistList()](/code/functions/projectAssistList.md), [projectAssistOverview()](/code/functions/projectAssistOverview.md), [projectAssistRaid()](/code/functions/projectAssistRaid.md), [projectAssistTasks()](/code/functions/projectAssistTasks.md), [projectVisibleSql()](/code/functions/projectVisibleSql.md), [ticketAiSubjectSql()](/code/functions/ticketAiSubjectSql.md), [warRoomSearch()](/code/functions/warRoomSearch.md)

