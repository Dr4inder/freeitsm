# api/v1/resources/network_mapper.php

> API endpoint - 913 lines

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/network_mapper.php` |
| Protected by | REST API key |
| Reads | `GET all_versions`, `GET q`, `GET contains_object_id`, `GET created_by`, `GET updated_since`, `GET include_properties`, `GET chain`, `GET object_id`, `GET limit` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiNmDiagramSelect()](/code/functions/apiNmDiagramSelect.md) | 70 |  |
| [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md) | 79 |  |
| [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md) | 90 | Writes are leaf-only — a version with children is frozen history. |
| [apiNmLoadNode()](/code/functions/apiNmLoadNode.md) | 96 |  |
| [apiNmLoadConnector()](/code/functions/apiNmLoadConnector.md) | 106 |  |
| [apiNmChainIds()](/code/functions/apiNmChainIds.md) | 117 | The whole version chain containing `$diagramId`: root first. Caps mirror the UI (200 up / 500 total). |
| [apiSerializeNmDiagram()](/code/functions/apiSerializeNmDiagram.md) | 144 |  |
| [apiNmNodeSelect()](/code/functions/apiNmNodeSelect.md) | 173 |  |
| [apiSerializeNmNode()](/code/functions/apiSerializeNmNode.md) | 182 |  |
| [apiNmConnectorsForDiagram()](/code/functions/apiNmConnectorsForDiagram.md) | 201 | Connectors with endpoint objects + the CMDB relationship verb they represent. |
| [apiSerializeNmConnector()](/code/functions/apiSerializeNmConnector.md) | 220 |  |
| [apiNmConnectorHydrated()](/code/functions/apiNmConnectorHydrated.md) | 244 | Load one connector by id fully hydrated (for single-op responses). |
| [apiNmValidateObjectExists()](/code/functions/apiNmValidateObjectExists.md) | 255 |  |
| [apiNmValidateSize()](/code/functions/apiNmValidateSize.md) | 271 |  |
| [apiNmValidateLineStyle()](/code/functions/apiNmValidateLineStyle.md) | 278 |  |
| [apiNmValidateIcon()](/code/functions/apiNmValidateIcon.md) | 285 |  |
| [apiNmResolveEndpoint()](/code/functions/apiNmResolveEndpoint.md) | 299 | Resolve a connector endpoint to a node id on this diagram. Accepts {prefix}_node_id or {prefix}_object_id (422 if the object isn't on the diagram, or is on it more than once — use node ids to disambiguate). |
| [apiNmResolveRelationshipId()](/code/functions/apiNmResolveRelationshipId.md) | 326 | Resolve cmdb_relationship_id input: null clears, an int is validated, 'auto' finds the existing CMDB relationship between the two objects (either direction; null if none). |
| [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md) | 358 | Validate + normalise one node input row. Returns [cmdb_object_id, x\|null, y\|null, size, icon_override, ref] — null x/y means auto-place. |
| [apiNmAutoPlacer()](/code/functions/apiNmAutoPlacer.md) | 386 | Auto-placement for nodes sent without coordinates: a fresh column to the right of the current bounding box, stacking downward — legible enough for an agent drop; a human tidies the layout in the editor. |
| [apiNmDiagramsList()](/code/functions/apiNmDiagramsList.md) | 405 | GET /network-diagrams — current versions by default; ?all_versions=true for everything. |
| [apiNmDiagramsGet()](/code/functions/apiNmDiagramsGet.md) | 454 | GET /network-diagrams/{id} — fully hydrated; ?include_properties=true adds each object's CI properties. |
| [apiNmObjectProperties()](/code/functions/apiNmObjectProperties.md) | 496 | Typed property values for the distinct objects behind a diagram's nodes, keyed by object id. |
| [apiNmDiagramsCreate()](/code/functions/apiNmDiagramsCreate.md) | 539 | POST /network-diagrams — create, optionally with initial contents in one call. |
| [apiNmRespondFull()](/code/functions/apiNmRespondFull.md) | 548 | Respond with the full hydrated diagram (shared by create/update/version). |
| [apiNmDiagramsUpdate()](/code/functions/apiNmDiagramsUpdate.md) | 558 | PATCH /network-diagrams/{id} — partial metadata; sending nodes/connectors = full contents replace. |
| [apiNmDiagramsDelete()](/code/functions/apiNmDiagramsDelete.md) | 566 | DELETE /network-diagrams/{id} — leaf-only (parent resurfaces as current); ?chain=true deletes the whole chain. |
| [apiNmVersionsList()](/code/functions/apiNmVersionsList.md) | 579 | GET /network-diagrams/{id}/versions — the whole chain, oldest first. |
| [apiNmVersionsCreate()](/code/functions/apiNmVersionsCreate.md) | 591 | POST /network-diagrams/{id}/versions — clone the leaf forward (the editor's "New version"). |
| [apiNmSuggestionsList()](/code/functions/apiNmSuggestionsList.md) | 603 | GET /network-diagrams/{id}/suggestions — CMDB neighbours of on-diagram objects not yet drawn. |
| [apiNmNodesCreate()](/code/functions/apiNmNodesCreate.md) | 695 | POST /network-diagrams/{id}/nodes — add one node (object) or a batch ({"nodes": [...]}). |
| [apiNmNodesUpdate()](/code/functions/apiNmNodesUpdate.md) | 757 | PATCH /network-diagrams/{id}/nodes/{node_id} — move / resize / re-icon. |
| [apiNmNodesDelete()](/code/functions/apiNmNodesDelete.md) | 791 | DELETE /network-diagrams/{id}/nodes/{node_id} — the node and its connectors. |
| [apiNmConnectorsCreate()](/code/functions/apiNmConnectorsCreate.md) | 818 | POST /network-diagrams/{id}/connectors — endpoints by node id or object id. |
| [apiNmConnectorsUpdate()](/code/functions/apiNmConnectorsUpdate.md) | 854 | PATCH /network-diagrams/{id}/connectors/{connector_id} — label / style / provenance. |
| [apiNmConnectorsDelete()](/code/functions/apiNmConnectorsDelete.md) | 887 | DELETE /network-diagrams/{id}/connectors/{connector_id} |
| [apiCmdbIconsList()](/code/functions/apiCmdbIconsList.md) | 901 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 71 | `apiNmDiagramSelect` | read [network_diagrams](/code/tables/network_diagrams.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [network_diagram_connectors](/code/tables/network_diagram_connectors.md), read [analysts](/code/tables/analysts.md) |  |
| 97 | `apiNmLoadNode` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 107 | `apiNmLoadConnector` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 120 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 131 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 174 | `apiNmNodeSelect` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md), read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 203 | `apiNmConnectorsForDiagram` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md) |  |
| 256 | `apiNmValidateObjectExists` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 286 | `apiNmValidateIcon` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 307 | `apiNmResolveEndpoint` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 332 | `apiNmResolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 345 | `apiNmResolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md) |  |
| 387 | `apiNmAutoPlacer` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 409 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 418 | `apiNmDiagramsList` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 433 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 505 | `apiNmObjectProperties` | read [cmdb_object_properties](/code/tables/cmdb_object_properties.md), read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 605 | `apiNmSuggestionsList` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 628 | `apiNmSuggestionsList` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md), read [cmdb_object_properties](/code/tables/cmdb_object_properties.md), read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |
| 670 | `apiNmSuggestionsList` | read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md), read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 715 | `apiNmNodesCreate` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 728 | `apiNmNodesCreate` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 740 | `apiNmNodesCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 775 | `apiNmNodesUpdate` | **update** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`x`, `y`, `size`, `icon_override`) |  |
| 783 | `apiNmNodesUpdate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 798 | `apiNmNodesDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 801 | `apiNmNodesDelete` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 802 | `apiNmNodesDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 829 | `apiNmConnectorsCreate` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 841 | `apiNmConnectorsCreate` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |
| 848 | `apiNmConnectorsCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 870 | `apiNmConnectorsUpdate` | **update** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`cmdb_relationship_id`, `label`, `line_style`) |  |
| 881 | `apiNmConnectorsUpdate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 892 | `apiNmConnectorsDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 893 | `apiNmConnectorsDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 903 | `apiCmdbIconsList` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiCmdbClassDefs()](/code/functions/apiCmdbClassDefs.md), [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md)

