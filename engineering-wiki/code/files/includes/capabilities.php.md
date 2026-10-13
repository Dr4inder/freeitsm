# includes/capabilities.php

> PHP - 621 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [settingsManifests()](/code/functions/settingsManifests.md) | 314 | Every module's settings manifest, loaded once. |
| [settingsManifestFor()](/code/functions/settingsManifestFor.md) | 329 | The manifest for one module, or null. |
| [capModules()](/code/functions/capModules.md) | 341 | Modules that own capabilities, and how to name them in the Roles picker. DERIVED from the manifests. Keys are the Layer 1 module slugs. |
| [capRegistry()](/code/functions/capRegistry.md) | 360 | The capability registry — DERIVED from the manifests. |
| [capAliases()](/code/functions/capAliases.md) | 401 | Retired keys -> their current replacement. |
| [capAll()](/code/functions/capAll.md) | 413 | Every declared capability key. Enum twin: Capability::cases(). |
| [capExists()](/code/functions/capExists.md) | 419 | Is this a capability the code defines? Enum twin: Capability::tryFrom() !== null. |
| [capFromKey()](/code/functions/capFromKey.md) | 431 | Resolve a key that came from OUTSIDE the code (a DB row, a form post) to a known capability, or null if the code no longer defines it. Enum twin: Capability::tryFrom(). |
| [capLabel()](/code/functions/capLabel.md) | 440 | Human description, shown in System -> Roles. Enum twin: `$cap`->label(). |
| [capModule()](/code/functions/capModule.md) | 446 | The module this capability administers. Enum twin: `$cap`->module(). |
| [capModuleLabel()](/code/functions/capModuleLabel.md) | 452 | Display name for a module slug. Enum twin: `$module`->label(). |
| [capIsSensitive()](/code/functions/capIsSensitive.md) | 458 | Does granting this need a second thought? Enum twin: `$cap`->isSensitive(). |
| [capsForModule()](/code/functions/capsForModule.md) | 464 | Every capability belonging to a module. Enum twin: Capability::forModule(). |
| [capUmbrella()](/code/functions/capUmbrella.md) | 474 | The module's umbrella capability ('<module>.manage'), or null if it has none. |
| [capExpandUmbrellas()](/code/functions/capExpandUmbrellas.md) | 494 | Expand umbrella grants: holding '<module>.manage' means holding every capability in that module. |
| [capGroups()](/code/functions/capGroups.md) | 513 | The registry shaped for the System -> Roles picker: grouped by module, labelled, with the umbrella first so "manage everything here" reads as the headline choice. |
| [capSelfCheck()](/code/functions/capSelfCheck.md) | 557 | Self-check: the things derivation CANNOT rule out. |
| [capIsUmbrella()](/code/functions/capIsUmbrella.md) | 617 | Is this capability its module's umbrella? |

## Classes

- [Cap](/code/classes/Cap.md) (class, line 62) - The capability keys. THE TYPE. Every guard call site names one of these constants.

## How it hangs together

**Included by:** [api/assets/asset_tag_preview.php](/code/files/api/assets/asset_tag_preview.php.md), [api/assets/get_asset_label_settings.php](/code/files/api/assets/get_asset_label_settings.php.md), [api/assets/get_asset_tag_settings.php](/code/files/api/assets/get_asset_tag_settings.php.md), [api/assets/save_asset_label_settings.php](/code/files/api/assets/save_asset_label_settings.php.md), [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md), [api/system/debug-tools/D005_endpoint_permissions.php](/code/files/api/system/debug-tools/D005_endpoint_permissions.php.md), [asset-management/labels.php](/code/files/asset-management/labels.php.md), [asset-management/settings/manifest.php](/code/files/asset-management/settings/manifest.php.md), [calendar/settings/manifest.php](/code/files/calendar/settings/manifest.php.md), [change-management/settings/manifest.php](/code/files/change-management/settings/manifest.php.md), [cmdb/settings/manifest.php](/code/files/cmdb/settings/manifest.php.md), [contracts/settings/manifest.php](/code/files/contracts/settings/manifest.php.md), [domains/settings/manifest.php](/code/files/domains/settings/manifest.php.md), [files/settings/manifest.php](/code/files/files/settings/manifest.php.md), [forms/settings/manifest.php](/code/files/forms/settings/manifest.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md), [includes/settings_keys.php](/code/files/includes/settings_keys.php.md), [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), [knowledge/settings/manifest.php](/code/files/knowledge/settings/manifest.php.md), [lms/settings/manifest.php](/code/files/lms/settings/manifest.php.md), [morning-checks/settings/manifest.php](/code/files/morning-checks/settings/manifest.php.md), [problem-management/settings/manifest.php](/code/files/problem-management/settings/manifest.php.md), [process-mapper/settings/manifest.php](/code/files/process-mapper/settings/manifest.php.md), [projects/settings/manifest.php](/code/files/projects/settings/manifest.php.md), [service-status/settings/manifest.php](/code/files/service-status/settings/manifest.php.md), [software/settings/manifest.php](/code/files/software/settings/manifest.php.md), [tasks/settings/manifest.php](/code/files/tasks/settings/manifest.php.md), [tickets/settings/manifest.php](/code/files/tickets/settings/manifest.php.md), [war-room/settings/manifest.php](/code/files/war-room/settings/manifest.php.md), [watchtower/settings/manifest.php](/code/files/watchtower/settings/manifest.php.md), [workflow/settings/manifest.php](/code/files/workflow/settings/manifest.php.md)

**Calls:** [settingKeyOwner()](/code/functions/settingKeyOwner.md)

