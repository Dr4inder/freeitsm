# includes/services/network_mapper.php

> PHP - 518 lines

NetworkMapperService — the shared write rules for network diagrams: create, full-contents save (metadata + nodes + connectors replace), delete (leaf/chain) and version fork.

Shared by the UI endpoints (api/network-mapper/*.php) and the REST API
(api/v1/resources/network_mapper.php). Each caller passes an ActorContext +
canonical input; this layer validates + writes and returns the affected id(s)
or throws ServiceError. It never emits HTTP.

SCOPE: the diagram-level writes (create / save / delete / version) that are
duplicated between the UI and API. The API's *incremental* node/connector
endpoints (POST/PATCH/DELETE .../nodes|connectors) are API-only (no UI twin)
and keep their own handlers in the resource — this service is not involved.

Canonical behaviour = the API resource's: writes are leaf-only (a version
with children is frozen — 409), the full-replace validates every node
(cmdb_object_id exists, size/icon valid) and every connector (endpoints
resolvable, no self-link, line_style valid, relationship id / 'auto'), and
nodes without coordinates auto-place. The raw UI's save_diagram.php was loose
(it silently skipped invalid rows); the UI now adopts the strict validation.

Property/branding input shapes: the service reads the API's canonical forms
(nested `branding.{band}.{slot}`, node `ref` + connector `from_ref/to_ref`);
the UI adapter maps its flat branding keys + node-id refs onto them.

## Classes

- [NetworkMapperService](/code/classes/NetworkMapperService.md) (class, line 33)

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 54 | `NetworkMapperService::createDiagram` | **insert** [network_diagrams](/code/tables/network_diagrams.md) (`parent_diagram_id`, `title`, `description`, `version_label`, `created_by_analyst_id`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`) |  |
| 106 | `NetworkMapperService::saveDiagram` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`title`, `description`, `version_label`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`, `footer_right`, `updated_datetime`) |  |
| 155 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 156 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 158 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagrams](/code/tables/network_diagrams.md) |  |
| 179 | `NetworkMapperService::createVersion` | **insert** [network_diagrams](/code/tables/network_diagrams.md) (`parent_diagram_id`, `title`, `description`, `version_label`, `created_by_analyst_id`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`) |  |
| 202 | `NetworkMapperService::createVersion` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 205 | `NetworkMapperService::createVersion` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 211 | `NetworkMapperService::createVersion` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 214 | `NetworkMapperService::createVersion` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |
| 240 | `NetworkMapperService::loadDiagram` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 265 | `NetworkMapperService::chainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 276 | `NetworkMapperService::chainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 319 | `NetworkMapperService::replaceContents` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 320 | `NetworkMapperService::replaceContents` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 326 | `NetworkMapperService::replaceContents` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 350 | `NetworkMapperService::replaceContents` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |
| 422 | `NetworkMapperService::autoPlacer` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 446 | `NetworkMapperService::resolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 459 | `NetworkMapperService::resolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md) |  |
| 470 | `NetworkMapperService::validateObjectExists` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 510 | `NetworkMapperService::validateIcon` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/cmdb/create_impact_diagram.php](/code/files/api/cmdb/create_impact_diagram.php.md), [api/network-mapper/create_diagram.php](/code/files/api/network-mapper/create_diagram.php.md), [api/network-mapper/create_version.php](/code/files/api/network-mapper/create_version.php.md), [api/network-mapper/delete_diagram.php](/code/files/api/network-mapper/delete_diagram.php.md), [api/network-mapper/save_diagram.php](/code/files/api/network-mapper/save_diagram.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md)

**Calls:** [getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

