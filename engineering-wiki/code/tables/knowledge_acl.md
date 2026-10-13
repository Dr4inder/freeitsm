# knowledge_acl

── The access list ───────────────────────────────────────────────────── 🔑 THERE IS NO allow/deny COLUMN, AND ITS ABSENCE IS THE GUARANTEE. The polarity comes from the object (is_restricted): rows on an Open object are denies, rows on a Restricted object are grants. A contradictory pair therefore cannot be stored, so there is no precedence rule to remember and no effective-permissions dialog to explain. This is the same instinct as the audience ladder — make the contradiction inexpressible rather than adjudicating it.  ⚠️ Flipping an object's polarity WIPES its rows. Keeping them dormant would mean an invisible entry that springs back to life on the next flip, which is the "an unloaded checkbox looks exactly like OFF" failure in a costume.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `object_type` | `VARCHAR(10) NOT NULL` | 'folder' \| 'article' |
| `object_id` | `INT NOT NULL` |  |
| `principal_type` | `VARCHAR(12) NOT NULL` | 'analyst' \| 'team' \| 'user' \| 'user_group' |
| `principal_id` | `INT NOT NULL` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md):266 | `handleDelete` | delete |  |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md):247 | `handleSetMode` | delete |  |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md):273 | `handleAdd` | insert | `object_type`, `object_id`, `principal_type`, `principal_id`, `created_by_id`, `created_datetime` |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md):292 | `handleRemove` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) | handleExceptions L399, handleExceptions L416 |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md) | handleGet L110, resolveInherited L174, handleSetMode L244, handleRemove L302 |  |
| [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) | knowledgeAclHasAnyRows L777, knowledgeAclIndex L796 |  |

