# network_diagram_nodes

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `diagram_id` | `INT NOT NULL` |  |
| `cmdb_object_id` | `INT NOT NULL` |  |
| `x` | `INT NOT NULL DEFAULT 0` |  |
| `y` | `INT NOT NULL DEFAULT 0` |  |
| `size` | `VARCHAR(20) NOT NULL DEFAULT 'medium'` |  |
| `icon_override` | `VARCHAR(100) NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3266 |  | delete |  |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3268 |  | delete |  |  |
| [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md):728 | `apiNmNodesCreate` | insert | `diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override` |  |
| [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md):775 | `apiNmNodesUpdate` | update | `x`, `y`, `size`, `icon_override` |  |
| [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md):801 | `apiNmNodesDelete` | delete |  |  |
| [includes/services/cmdb.php](/code/files/includes/services/cmdb.php.md):281 | `CmdbService::deleteObject` | delete |  |  |
| [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md):156 | `NetworkMapperService::deleteDiagram` | delete |  |  |
| [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md):205 | `NetworkMapperService::createVersion` | insert | `diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override` |  |
| [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md):318 | `NetworkMapperService::replaceContents` | delete |  |  |
| [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md):324 | `NetworkMapperService::replaceContents` | insert | `diagram_id`, `cmdb_object_id`, `x`, `y`, `size`, `icon_override` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/network-mapper/get_diagram.php](/code/files/api/network-mapper/get_diagram.php.md) | L72 |  |
| [api/network-mapper/list_diagrams.php](/code/files/api/network-mapper/list_diagrams.php.md) | L47 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3273, L3274 |  |
| [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) | apiNmDiagramSelect L71, apiNmLoadNode L97, apiNmNodeSelect L174, apiNmConnectorsForDiagram L203, apiNmResolveEndpoint L307, apiNmResolveRelationshipId L332 ... |  |
| [includes/services/cmdb.php](/code/files/includes/services/cmdb.php.md) | CmdbService::deleteObject L278 |  |
| [includes/services/network_mapper.php](/code/files/includes/services/network_mapper.php.md) | NetworkMapperService::createVersion L202, NetworkMapperService::autoPlacer L416, NetworkMapperService::resolveRelationshipId L436 |  |

