# includes/watchtower_settings.php

> PHP - 356 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [wtCardKeys()](/code/functions/wtCardKeys.md) | 34 | Every card Watchtower draws, in the order it draws them. |
| [wtScopeIsValid()](/code/functions/wtScopeIsValid.md) | 57 |  |
| [wtImpersonalCards()](/code/functions/wtImpersonalCards.md) | 71 | The cards with no notion of an owner. |
| [wtCardCanScope()](/code/functions/wtCardCanScope.md) | 101 | Can this card narrow to a person or a team at all? |
| [wtImpersonalOnMine()](/code/functions/wtImpersonalOnMine.md) | 118 | What this analyst wants done with the impersonal cards while on "Mine": 'show' (marked as everyone's) or 'hide'. |
| [wtScopeFor()](/code/functions/wtScopeFor.md) | 135 | The scope this analyst last chose. Defaults to everyone, i.e. today's view. |
| [wtTeamAnalystIds()](/code/functions/wtTeamAnalystIds.md) | 159 | The analyst ids "team" covers: everyone on any team this analyst belongs to, including themselves. |
| [wtMorningCheckScope()](/code/functions/wtMorningCheckScope.md) | 194 | "Mine" for a morning check, which is not a column. |
| [wtScopeClause()](/code/functions/wtScopeClause.md) | 232 | A SQL fragment restricting `$column` to the chosen scope, plus its parameters. Returns ['', []] for "everyone", so a caller can concatenate unconditionally. |
| [wtSelectableItems()](/code/functions/wtSelectableItems.md) | 249 | The set-driven items, and what kind of thing each one selects from. item_key => ['entity_type' => …, 'table' => …, 'id' => …, 'name' => …, 'where' => …] |
| [wtVisibleCards()](/code/functions/wtVisibleCards.md) | 299 | Card visibility. Missing row = visible. |
| [wtItemMembers()](/code/functions/wtItemMembers.md) | 326 | The chosen members for an item, or NULL meaning "not customised, use the built-in default". An empty ARRAY is a real answer — the admin chose nothing — and is not the same as null. |
| [wtIdListSql()](/code/functions/wtIdListSql.md) | 351 | A safe `IN (…)` fragment from a list of ints. '(0)' when empty, so it matches nothing. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 123 | `wtImpersonalOnMine` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 140 | `wtScopeFor` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 164 | `wtTeamAnalystIds` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 203 | `wtMorningCheckScope` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 304 | `wtVisibleCards` | read [watchtower_items](/code/tables/watchtower_items.md) |  |
| 333 | `wtItemMembers` | read [watchtower_items](/code/tables/watchtower_items.md) |  |
| 338 | `wtItemMembers` | read [watchtower_item_members](/code/tables/watchtower_item_members.md) |  |

## How it hangs together

**Included by:** [api/watchtower/get_settings.php](/code/files/api/watchtower/get_settings.php.md), [api/watchtower/save_settings.php](/code/files/api/watchtower/save_settings.php.md), [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md), [watchtower/index.php](/code/files/watchtower/index.php.md)

