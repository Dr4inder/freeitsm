# api/v1/resources/network_mapper.php

> API endpoint - 951 lines

FreeITSM REST API v1 — network-mapper resource (diagrams, nodes, connectors, versions, suggestions).

Built for programmatic diagram maintenance — the target consumer is a
discovery tool or AI agent keeping network documentation alive, so the
surface is deliberately richer than the module's internal endpoints:

  - reads are fully hydrated for machine understanding: every node carries
    its CMDB object's name/class/effective icon/planned flag (and, with
    ?include_properties=true, the object's full typed property values);
    connectors carry both endpoints' object ids/names and the CMDB
    relationship verb they represent; a computed layout block gives the
    canvas bounding box and the pixel size of each node size class;
  - writes come in BOTH granularities: incremental node/connector
    operations with STABLE ids (the UI editor can only full-replace, which
    regenerates every id on save), and a full-replace mode on PATCH for
    wholesale redraws;
  - connectors can be addressed by *object* ids, not just node ids, and
    `cmdb_relationship_id: "auto"` binds the connector to the existing
    CMDB relationship between the two objects — an agent thinks in CIs,
    the API translates;
  - GET .../suggestions is the "what's missing" tool: CMDB neighbours
    (relationships in both directions + object_ref property links) of
    on-diagram objects that aren't drawn yet.

Versioning parity with the module: a linear chain via parent_diagram_id;
the LEAF (no children) is the only editable version, ancestors are frozen
history (writes to them are a 409). POST .../versions clones the leaf
forward exactly like the editor's "New version". DELETE is leaf-only
(deleting the leaf resurfaces its parent as current) or ?chain=true for
the whole chain — stricter than the UI, which lets a mid-chain delete
corrupt the version chain.

Deliberate improvements over the internal endpoints, documented:
  - unknown cmdb_object_id / relationship ids / sizes / line styles /
    icon keys are a 422 (save_diagram.php silently SKIPS bad nodes and
    connectors — machines deserve the error);
  - adding an object already on the diagram is a 409 unless
    allow_duplicate=true (the editor allows silent duplicates).

MULTI-TENANCY: the network tables themselves are install-wide (no tenant_id)
— but the CMDB objects they reference are NOT, as of the CMDB slice. So a key
may only place a CI it can reach onto a diagram (apiNmValidateObjectExists),
mirroring NetworkMapperService. Node/connector READS deliberately do not
filter by the CI's company, matching api/network-mapper/get_diagram.php:
diagrams have no company of their own, so filtering would make CIs silently
vanish from existing diagrams. Both routes onto a canvas are scoped, so the
residual is historical data only. Giving diagrams a company is the first job
of Network Mapper's own multi-tenancy slice.
No audit trail exists for diagrams and none was invented.

Depends on cmdb.php (apiCmdbClassDefs) — index.php requires it earlier.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/network_mapper.php` |
| Protected by | REST API key |
| Reads | `GET all_versions`, `GET q`, `GET contains_object_id`, `GET created_by`, `GET updated_since`, `GET include_properties`, `GET chain`, `GET object_id`, `GET limit` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiNmDiagramSelect()](/code/functions/apiNmDiagramSelect.md) | 74 | The SELECT for diagrams, with the author's name and counts of child versions, nodes and connectors - child_count 0 marks the current version. |
| [apiNmLoadDiagram()](/code/functions/apiNmLoadDiagram.md) | 84 | Loads one diagram row (apiNmDiagramSelect), or answers 404 and stops. |
| [apiNmRequireLeaf()](/code/functions/apiNmRequireLeaf.md) | 95 | Writes are leaf-only — a version with children is frozen history. |
| [apiNmLoadNode()](/code/functions/apiNmLoadNode.md) | 102 | Loads one node row that belongs to the given diagram, or answers 404 and stops. |
| [apiNmLoadConnector()](/code/functions/apiNmLoadConnector.md) | 113 | Loads one connector row that belongs to the given diagram, or answers 404 and stops. |
| [apiNmChainIds()](/code/functions/apiNmChainIds.md) | 124 | The whole version chain containing `$diagramId`: root first. Caps mirror the UI (200 up / 500 total). |
| [apiSerializeNmDiagram()](/code/functions/apiSerializeNmDiagram.md) | 155 | Shapes a diagram row for the API - ids, title, version, is_current, author, dates and counts, plus paper and header/footer branding when `$full`. |
| [apiNmNodeSelect()](/code/functions/apiNmNodeSelect.md) | 185 | The SELECT for diagram nodes, joined to their CMDB object, its class and the class icon. |
| [apiSerializeNmNode()](/code/functions/apiSerializeNmNode.md) | 198 | Shapes a node row for the API - position, size (and its pixel size), the icon that actually renders, and its CMDB object with class. |
| [apiNmConnectorsForDiagram()](/code/functions/apiNmConnectorsForDiagram.md) | 217 | Connectors with endpoint objects + the CMDB relationship verb they represent. |
| [apiSerializeNmConnector()](/code/functions/apiSerializeNmConnector.md) | 240 | Shapes a connector row for the API - both endpoints (node and object), the CMDB relationship and its verbs when bound to one, label and line style. |
| [apiNmConnectorHydrated()](/code/functions/apiNmConnectorHydrated.md) | 264 | Load one connector by id fully hydrated (for single-op responses). |
| [apiNmValidateObjectExists()](/code/functions/apiNmValidateObjectExists.md) | 280 | Answers 422 and stops unless the CMDB object exists and, when a key is given, belongs to a company the key can reach - the same message either way, so another company's object is never revealed. |
| [apiNmValidateSize()](/code/functions/apiNmValidateSize.md) | 300 | Returns the node size when it is a known size class, otherwise answers 422 listing the valid ones. |
| [apiNmValidateLineStyle()](/code/functions/apiNmValidateLineStyle.md) | 311 | Returns the connector line style when it is a known one, otherwise answers 422 listing the valid ones. |
| [apiNmValidateIcon()](/code/functions/apiNmValidateIcon.md) | 319 | Returns the icon key when it is in cmdb_icons, otherwise answers 422 pointing at GET /cmdb-icons. |
| [apiNmResolveEndpoint()](/code/functions/apiNmResolveEndpoint.md) | 333 | Resolve a connector endpoint to a node id on this diagram. Accepts {prefix}_node_id or {prefix}_object_id (422 if the object isn't on the diagram, or is on it more than once — use node ids to disambiguate). |
| [apiNmResolveRelationshipId()](/code/functions/apiNmResolveRelationshipId.md) | 360 | Resolve cmdb_relationship_id input: null clears, an int is validated, 'auto' finds the existing CMDB relationship between the two objects (either direction; null if none). |
| [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md) | 392 | Validate + normalise one node input row. Returns [cmdb_object_id, x\|null, y\|null, size, icon_override, ref] — null x/y means auto-place. |
| [apiNmAutoPlacer()](/code/functions/apiNmAutoPlacer.md) | 420 | Auto-placement for nodes sent without coordinates: a fresh column to the right of the current bounding box, stacking downward — legible enough for an agent drop; a human tidies the layout in the editor. |
| [apiNmDiagramsList()](/code/functions/apiNmDiagramsList.md) | 439 | GET /network-diagrams — current versions by default; ?all_versions=true for everything. |
| [apiNmDiagramsGet()](/code/functions/apiNmDiagramsGet.md) | 488 | GET /network-diagrams/{id} — fully hydrated; ?include_properties=true adds each object's CI properties. |
| [apiNmObjectProperties()](/code/functions/apiNmObjectProperties.md) | 530 | Typed property values for the distinct objects behind a diagram's nodes, keyed by object id. |
| [apiNmDiagramsCreate()](/code/functions/apiNmDiagramsCreate.md) | 573 | POST /network-diagrams — create, optionally with initial contents in one call. |
| [apiNmRespondFull()](/code/functions/apiNmRespondFull.md) | 582 | Respond with the full hydrated diagram (shared by create/update/version). |
| [apiNmDiagramsUpdate()](/code/functions/apiNmDiagramsUpdate.md) | 592 | PATCH /network-diagrams/{id} — partial metadata; sending nodes/connectors = full contents replace. |
| [apiNmDiagramsDelete()](/code/functions/apiNmDiagramsDelete.md) | 600 | DELETE /network-diagrams/{id} — leaf-only (parent resurfaces as current); ?chain=true deletes the whole chain. |
| [apiNmVersionsList()](/code/functions/apiNmVersionsList.md) | 613 | GET /network-diagrams/{id}/versions — the whole chain, oldest first. |
| [apiNmVersionsCreate()](/code/functions/apiNmVersionsCreate.md) | 625 | POST /network-diagrams/{id}/versions — clone the leaf forward (the editor's "New version"). |
| [apiNmSuggestionsList()](/code/functions/apiNmSuggestionsList.md) | 637 | GET /network-diagrams/{id}/suggestions — CMDB neighbours of on-diagram objects not yet drawn. |
| [apiNmNodesCreate()](/code/functions/apiNmNodesCreate.md) | 729 | POST /network-diagrams/{id}/nodes — add one node (object) or a batch ({"nodes": [...]}). |
| [apiNmNodesUpdate()](/code/functions/apiNmNodesUpdate.md) | 791 | PATCH /network-diagrams/{id}/nodes/{node_id} — move / resize / re-icon. |
| [apiNmNodesDelete()](/code/functions/apiNmNodesDelete.md) | 825 | DELETE /network-diagrams/{id}/nodes/{node_id} — the node and its connectors. |
| [apiNmConnectorsCreate()](/code/functions/apiNmConnectorsCreate.md) | 852 | POST /network-diagrams/{id}/connectors — endpoints by node id or object id. |
| [apiNmConnectorsUpdate()](/code/functions/apiNmConnectorsUpdate.md) | 888 | PATCH /network-diagrams/{id}/connectors/{connector_id} — label / style / provenance. |
| [apiNmConnectorsDelete()](/code/functions/apiNmConnectorsDelete.md) | 921 | DELETE /network-diagrams/{id}/connectors/{connector_id} |
| [apiCmdbIconsList()](/code/functions/apiCmdbIconsList.md) | 939 | GET /cmdb-icons - the icon catalogue (key, label, active), the valid values for a node's icon_override. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 75 | `apiNmDiagramSelect` | read [network_diagrams](/code/tables/network_diagrams.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [network_diagram_connectors](/code/tables/network_diagram_connectors.md), read [analysts](/code/tables/analysts.md) |  |
| 103 | `apiNmLoadNode` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 114 | `apiNmLoadConnector` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 127 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 138 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 186 | `apiNmNodeSelect` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md), read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 219 | `apiNmConnectorsForDiagram` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md), read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md) |  |
| 281 | `apiNmValidateObjectExists` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 320 | `apiNmValidateIcon` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 341 | `apiNmResolveEndpoint` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 366 | `apiNmResolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 379 | `apiNmResolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md) |  |
| 421 | `apiNmAutoPlacer` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 443 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 452 | `apiNmDiagramsList` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 467 | `apiNmDiagramsList` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 539 | `apiNmObjectProperties` | read [cmdb_object_properties](/code/tables/cmdb_object_properties.md), read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 639 | `apiNmSuggestionsList` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 662 | `apiNmSuggestionsList` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md), read [cmdb_object_properties](/code/tables/cmdb_object_properties.md), read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |
| 704 | `apiNmSuggestionsList` | read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md), read [cmdb_icons](/code/tables/cmdb_icons.md) |  |
| 749 | `apiNmNodesCreate` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 762 | `apiNmNodesCreate` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 774 | `apiNmNodesCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 809 | `apiNmNodesUpdate` | **update** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`x`, `y`, `size`, `icon_override`) |  |
| 817 | `apiNmNodesUpdate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 832 | `apiNmNodesDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 835 | `apiNmNodesDelete` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 836 | `apiNmNodesDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 863 | `apiNmConnectorsCreate` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 875 | `apiNmConnectorsCreate` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |
| 882 | `apiNmConnectorsCreate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 904 | `apiNmConnectorsUpdate` | **update** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`cmdb_relationship_id`, `label`, `line_style`) |  |
| 915 | `apiNmConnectorsUpdate` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 926 | `apiNmConnectorsDelete` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 927 | `apiNmConnectorsDelete` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`updated_datetime`) |  |
| 941 | `apiCmdbIconsList` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiCmdbClassDefs()](/code/functions/apiCmdbClassDefs.md), [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md)

