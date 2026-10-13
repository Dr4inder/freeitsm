# cmdb_relationship_types

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `verb` | `VARCHAR(100) NOT NULL` |  |
| `inverse_verb` | `VARCHAR(100) NOT NULL` |  |
| `description` | `VARCHAR(500) NULL` |  |
| `impact_direction` | `VARCHAR(10) NOT NULL DEFAULT 'none'` | none \| to_from \| from_to — whether a failure travels along this relationship and which way. Defaults to 'none' so an upgraded install spreads nothing until someone says it should. |
| `display_order` | `INT NULL DEFAULT 0` |  |
| `is_active` | `TINYINT(1) NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/cmdb/delete_relationship_type.php](/code/files/api/cmdb/delete_relationship_type.php.md):36 |  | delete |  |  |
| [api/cmdb/save_relationship_type.php](/code/files/api/cmdb/save_relationship_type.php.md):57 |  | insert | `verb`, `inverse_verb`, `description`, `impact_direction`, `display_order`, `is_active`, `created_datetime` |  |
| [api/cmdb/save_relationship_type.php](/code/files/api/cmdb/save_relationship_type.php.md):66 |  | update | `verb`, `inverse_verb`, `description`, `impact_direction`, `display_order`, `is_active` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3829 |  | insert | `verb`, `inverse_verb`, `description`, `impact_direction`, `display_order` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/cmdb/delete_relationship_type.php](/code/files/api/cmdb/delete_relationship_type.php.md) | L35 |  |
| [api/cmdb/generate_object_summary.php](/code/files/api/cmdb/generate_object_summary.php.md) | L105, L118 |  |
| [api/cmdb/get_object.php](/code/files/api/cmdb/get_object.php.md) | L187, L204 |  |
| [api/cmdb/get_relationship_types.php](/code/files/api/cmdb/get_relationship_types.php.md) | L24 |  |
| [api/cmdb/save_relationship_type.php](/code/files/api/cmdb/save_relationship_type.php.md) | L49 |  |
| [api/network-mapper/get_related_objects.php](/code/files/api/network-mapper/get_related_objects.php.md) | L64, L94 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3826 |  |
| [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md) | apiCmdbObjectsGet L375, apiCmdbObjectsGet L385, apiCmdbRelationshipTypesList L581 |  |
| [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) | apiNmConnectorsForDiagram L219, apiNmSuggestionsList L662 |  |
| [includes/cmdb_impact.php](/code/files/includes/cmdb_impact.php.md) | cmdbHasImpactEdgesConfigured L89, cmdbDirectImpact L169, cmdbImpactEdgesFrom L286, cmdbImpactEdgesFrom L302 |  |
| [includes/services/cmdb.php](/code/files/includes/services/cmdb.php.md) | CmdbService::createRelationship L328, CmdbService::createRelationship L331 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolImpactOf L595 |  |

