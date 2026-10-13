# analyst_modules

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `analyst_id` | `INT NOT NULL` |  |
| `module_key` | `VARCHAR(50) NOT NULL` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md):598 | `oidcCreateAnalyst` | insert | `analyst_id`, `module_key` |  |
| [api/system/save_analyst_modules.php](/code/files/api/system/save_analyst_modules.php.md):38 |  | delete |  |  |
| [api/system/save_analyst_modules.php](/code/files/api/system/save_analyst_modules.php.md):45 |  | insert | `analyst_id`, `module_key` |  |
| [api/system/save_module_grants.php](/code/files/api/system/save_module_grants.php.md):46 |  | delete |  |  |
| [api/system/save_module_grants.php](/code/files/api/system/save_module_grants.php.md):48 |  | insert | `analyst_id`, `module_key` |  |
| [includes/ldap.php](/code/files/includes/ldap.php.md):548 | `ldapCreateAnalyst` | insert | `analyst_id`, `module_key` |  |
| [includes/services/analysts.php](/code/files/includes/services/analysts.php.md):209 | `AnalystsService::setAccess` | delete |  |  |
| [includes/services/analysts.php](/code/files/includes/services/analysts.php.md):210 | `AnalystsService::setAccess` | insert | `analyst_id`, `module_key` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L543 |  |
| [api/system/get_effective_module_access.php](/code/files/api/system/get_effective_module_access.php.md) | L31 |  |
| [includes/functions.php](/code/files/includes/functions.php.md) | getAnalystAllowedModules L144 |  |
| [includes/services/analysts.php](/code/files/includes/services/analysts.php.md) | AnalystsService::access L145 |  |

