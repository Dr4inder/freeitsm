# api/cmdb/save_class_property.php

> API endpoint - 140 lines

API: Create or update a property definition on a class. Handles dropdown options inline (passed as `options` array; we wipe and re-insert).

## The endpoint

| | |
|---|---|
| URL | `api/cmdb/save_class_property.php` |
| Protected by | Module access: cmdb (requireModuleAccessJson); Permission: Cap::CMDB_CLASSES (requireCapabilityJson) |
| Called from | [cmdb/object.js](/code/files/cmdb/object.js.md), [cmdb/settings/settings.js](/code/files/cmdb/settings/settings.js.md) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [slugifyProp()](/code/functions/slugifyProp.md) | 27 | Turns a property name into a lower-case key of letters, digits and underscores, falling back to 'property' when nothing is left. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 73 |  | read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |
| 82 |  | **insert** [cmdb_class_properties](/code/tables/cmdb_class_properties.md) (`class_id`, `property_key`, `label`, `property_type`, `target_class_id`, `is_required`, `spreads_impact`, `display_order`, `created_datetime`) |  |
| 90 |  | read [cmdb_class_properties](/code/tables/cmdb_class_properties.md) |  |
| 97 |  | **update** [cmdb_class_properties](/code/tables/cmdb_class_properties.md) (`property_key`, `label`, `property_type`, `target_class_id`, `is_required`, `spreads_impact`, `display_order`) |  |
| 109 |  | **delete** [cmdb_class_property_options](/code/tables/cmdb_class_property_options.md) |  |
| 110 |  | **insert** [cmdb_class_property_options](/code/tables/cmdb_class_property_options.md) (`property_id`, `option_value`, `colour`, `display_order`) |  |
| 130 |  | **delete** [cmdb_class_property_options](/code/tables/cmdb_class_property_options.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

