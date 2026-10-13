# NetworkMapperService

> Class in [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md), line 33

## Methods

| Method | What it does |
|---|---|
| [createDiagram()](#creatediagram) | Create a new diagram (v1 of a chain), optionally with contents. Returns the id. |
| [saveDiagram()](#savediagram) | Save a diagram: partial metadata; sending nodes/connectors replaces BOTH sets. Returns the id. |
| [deleteDiagram()](#deletediagram) | Delete a diagram version (leaf-only) or the whole chain. Returns ['id','versions_deleted']. |
| [createVersion()](#createversion) | Fork the leaf into a new version (clones nodes + connectors forward). Returns the new id. |
| [loadDiagram()](#loaddiagram) | Loads one diagram with a count of its newer versions; throws not found when it does not exist. |
| [requireLeaf()](#requireleaf) | Throws when the diagram is a historical version, which is read-only. |
| [chainIds()](#chainids) | The whole version chain containing `$diagramId`: root first. |
| [validatePaper()](#validatepaper) | paper_size / paper_orientation whitelists. |
| [brandingSlot()](#brandingslot) | Read a branding slot from in.branding.{band}.{slot}. NULL = inherit, '' = explicit blank. |
| [replaceContents()](#replacecontents) | Full contents replace (delete + reinsert; ref-based connector wiring, strict validation). |
| [validateNodeInput()](#validatenodeinput) | Validate one node input row. Returns [objectId, x\|null, y\|null, size, icon, ref]. |
| [autoPlacer()](#autoplacer) | A function that hands out positions for new nodes, in columns of eight to the right of what is already on the diagram. |
| [resolveRelationshipId()](#resolverelationshipid) | The CMDB relationship a connector stands for: null, 'auto' (any relationship between the two nodes' CIs) or a validated id. |
| [validateObjectExists()](#validateobjectexists) | Throws unless the CI exists and is in a company the actor can reach. |
| [validateSize()](#validatesize) | Validates a node size against NODE_SIZES. |
| [validateLineStyle()](#validatelinestyle) | Validates a connector line style against LINE_STYLES. |
| [validateIcon()](#validateicon) | Validates an icon key against cmdb_icons. |

### createDiagram

*public static* - line 43

Create a new diagram (v1 of a chain), optionally with contents. Returns the id.

```php
function createDiagram(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 54 | `NetworkMapperService::createDiagram` | **insert** [network_diagrams](/code/tables/network_diagrams.md) (`parent_diagram_id`, `title`, `description`, `version_label`, `created_by_analyst_id`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`) |  |

**Called from:** [api/cmdb/create_impact_diagram.php](/code/files/api/cmdb/create_impact_diagram.php.md), [api/network-mapper/create_diagram.php](/code/files/api/network-mapper/create_diagram.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md)

### saveDiagram

*public static* - line 89

Save a diagram: partial metadata; sending nodes/connectors replaces BOTH sets. Returns the id.

```php
function saveDiagram(PDO $conn, ActorContext $ctx, int $diagramId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$diagramId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 106 | `NetworkMapperService::saveDiagram` | **update** [network_diagrams](/code/tables/network_diagrams.md) (`title`, `description`, `version_label`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`, `footer_right`, `updated_datetime`) |  |

**Called from:** [api/network-mapper/save_diagram.php](/code/files/api/network-mapper/save_diagram.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md)

### deleteDiagram

*public static* - line 144

Delete a diagram version (leaf-only) or the whole chain. Returns ['id','versions_deleted'].

```php
function deleteDiagram(PDO $conn, ActorContext $ctx, int $diagramId, bool $chain = false): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$diagramId` | `int` |  |  |
| `$chain` | `bool` | `false` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 155 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 156 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 158 | `NetworkMapperService::deleteDiagram` | **delete** [network_diagrams](/code/tables/network_diagrams.md) |  |

**Called from:** [api/network-mapper/delete_diagram.php](/code/files/api/network-mapper/delete_diagram.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md)

### createVersion

*public static* - line 170

Fork the leaf into a new version (clones nodes + connectors forward). Returns the new id.

```php
function createVersion(PDO $conn, ActorContext $ctx, int $parentId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$parentId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 179 | `NetworkMapperService::createVersion` | **insert** [network_diagrams](/code/tables/network_diagrams.md) (`parent_diagram_id`, `title`, `description`, `version_label`, `created_by_analyst_id`, `paper_size`, `paper_orientation`, `header_left`, `header_center`, `header_right`, `footer_left`, `footer_center`) |  |
| 202 | `NetworkMapperService::createVersion` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 205 | `NetworkMapperService::createVersion` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 211 | `NetworkMapperService::createVersion` | read [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 214 | `NetworkMapperService::createVersion` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |

**Called from:** [api/network-mapper/create_version.php](/code/files/api/network-mapper/create_version.php.md), [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md)

### loadDiagram

*private static* - line 237

Loads one diagram with a count of its newer versions; throws not found when it does not exist.

```php
function loadDiagram(PDO $conn, int $diagramId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 240 | `NetworkMapperService::loadDiagram` | read [network_diagrams](/code/tables/network_diagrams.md) |  |

### requireLeaf

*private static* - line 253

Throws when the diagram is a historical version, which is read-only.

```php
function requireLeaf(array $diagram): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$diagram` | `array` |  |  |

### chainIds

*private static* - line 261

The whole version chain containing `$diagramId`: root first.

```php
function chainIds(PDO $conn, int $diagramId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 265 | `NetworkMapperService::chainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 276 | `NetworkMapperService::chainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |

### validatePaper

*private static* - line 286

paper_size / paper_orientation whitelists.

```php
function validatePaper(array $in, ?array $current): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$in` | `array` |  |  |
| `$current` | `?array` |  |  |

### brandingSlot

*private static* - line 305

Read a branding slot from in.branding.{band}.{slot}. NULL = inherit, '' = explicit blank.

```php
function brandingSlot(array $in, string $band, string $slot, ?string $current): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$in` | `array` |  |  |
| `$band` | `string` |  |  |
| `$slot` | `string` |  |  |
| `$current` | `?string` |  |  |

### replaceContents

*private static* - line 317

Full contents replace (delete + reinsert; ref-based connector wiring, strict validation).

```php
function replaceContents(
    PDO $conn,
    ActorContext $ctx,
    int $diagramId,
    array $nodesIn,
    array $connectorsIn
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$diagramId` | `int` |  |  |
| `$nodesIn` | `array` |  |  |
| `$connectorsIn` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 319 | `NetworkMapperService::replaceContents` | **delete** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) |  |
| 320 | `NetworkMapperService::replaceContents` | **delete** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 326 | `NetworkMapperService::replaceContents` | **insert** [network_diagram_nodes](/code/tables/network_diagram_nodes.md) (`diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override`) |  |
| 350 | `NetworkMapperService::replaceContents` | **insert** [network_diagram_connectors](/code/tables/network_diagram_connectors.md) (`diagram_id`, `from_node_id`, `to_node_id`, `cmdb_relationship_id`, `label`, `line_style`) |  |

### validateNodeInput

*private static* - line 392

Validate one node input row. Returns [objectId, x|null, y|null, size, icon, ref].

```php
function validateNodeInput(PDO $conn, ActorContext $ctx, array $n, int $index): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$n` | `array` |  |  |
| `$index` | `int` |  |  |

### autoPlacer

*private static* - line 420

A function that hands out positions for new nodes, in columns of eight to the right of what is already on the diagram.

```php
function autoPlacer(PDO $conn, int $diagramId): callable
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 422 | `NetworkMapperService::autoPlacer` | read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |

### resolveRelationshipId

*private static* - line 439

The CMDB relationship a connector stands for: null, 'auto' (any relationship between the two nodes' CIs) or a validated id.

```php
function resolveRelationshipId(PDO $conn, $raw, int $fromNodeId, int $toNodeId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$raw` |  |  |  |
| `$fromNodeId` | `int` |  |  |
| `$toNodeId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 446 | `NetworkMapperService::resolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [network_diagram_nodes](/code/tables/network_diagram_nodes.md) |  |
| 459 | `NetworkMapperService::resolveRelationshipId` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md) |  |

### validateObjectExists

*private static* - line 468

Throws unless the CI exists and is in a company the actor can reach.

```php
function validateObjectExists(PDO $conn, ActorContext $ctx, int $objectId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$objectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 470 | `NetworkMapperService::validateObjectExists` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |

### validateSize

*private static* - line 490

Validates a node size against NODE_SIZES.

```php
function validateSize(string $size): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$size` | `string` |  |  |

### validateLineStyle

*private static* - line 499

Validates a connector line style against LINE_STYLES.

```php
function validateLineStyle(string $style): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$style` | `string` |  |  |

### validateIcon

*private static* - line 508

Validates an icon key against cmdb_icons.

```php
function validateIcon(PDO $conn, string $iconKey): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$iconKey` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 510 | `NetworkMapperService::validateIcon` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

