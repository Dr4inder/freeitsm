# includes/files/acl.php

> PHP - 279 lines

## Classes

- [FilesAcl](/code/classes/FilesAcl.md) (class, line 39) - Files — who may do what to a folder. The ONE place that answers it.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 77 | `FilesAcl::tree` | read [files_folders](/code/tables/files_folders.md) |  |
| 112 | `FilesAcl::teamIds` | read [analyst_teams](/code/tables/analyst_teams.md), read [teams](/code/tables/teams.md) |  |
| 131 | `FilesAcl::levels` | read [files_permissions](/code/tables/files_permissions.md) |  |
| 198 | `FilesAcl::entries` | read [files_permissions](/code/tables/files_permissions.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md) |  |

## How it hangs together

**Included by:** [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md), [includes/files/audit.php](/code/files/includes/files/audit.php.md)

