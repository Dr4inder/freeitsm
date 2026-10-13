# includes/portal_preferences.php

> PHP - 95 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [portalPrefGet()](/code/functions/portalPrefGet.md) | 26 | One preference for one portal user, or `$default`. |
| [portalPrefSet()](/code/functions/portalPrefSet.md) | 50 | Store one preference. Returns false if it could not be stored — the caller decides whether that is worth telling anybody, and for a layout toggle it is not: the layout still changed, only the memory of it failed. |
| [portalKbLayout()](/code/functions/portalKbLayout.md) | 90 | The layout this portal user should see. Always one of PORTAL_KB_LAYOUTS. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 31 | `portalPrefGet` | read [portal_user_preferences](/code/tables/portal_user_preferences.md) |  |
| 57 | `portalPrefSet` | read [portal_user_preferences](/code/tables/portal_user_preferences.md) |  |
| 62 | `portalPrefSet` | **update** [portal_user_preferences](/code/tables/portal_user_preferences.md) (`preference_value`, `updated_datetime`) |  |
| 66 | `portalPrefSet` | **insert** [portal_user_preferences](/code/tables/portal_user_preferences.md) (`user_id`, `preference_key`, `preference_value`, `updated_datetime`) |  |

## How it hangs together

**Included by:** [api/self-service/preference.php](/code/files/api/self-service/preference.php.md)

