# includes/analyst_signin.php

> PHP - 188 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [analystSignInReady()](/code/functions/analystSignInReady.md) | 48 | Have the columns this needs been added yet? |
| [analystSignInTeamMethods()](/code/functions/analystSignInTeamMethods.md) | 71 | The sign-in methods set by analysts' active teams, grouped by analyst. |
| [analystSignInVerdict()](/code/functions/analystSignInVerdict.md) | 105 | Turn one analyst's team methods into a verdict. |
| [analystSignInFromTeams()](/code/functions/analystSignInFromTeams.md) | 118 | What one analyst's teams say, without changing anything. |
| [analystSignInApply()](/code/functions/analystSignInApply.md) | 129 | Bring one analyst's stored method in line with their teams, if they follow their team. Returns what happened, for the caller to report. |
| [analystSignInApplyMany()](/code/functions/analystSignInApplyMany.md) | 161 | Apply to several analysts and count the outcomes. |
| [analystSignInTeamMemberIds()](/code/functions/analystSignInTeamMemberIds.md) | 173 | The members of a team, for the callers that change the team itself. |
| [analystSignInFollowerIds()](/code/functions/analystSignInFollowerIds.md) | 181 | Every analyst who follows their team - used when a provider is deleted. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 53 | `analystSignInReady` | read [analysts](/code/tables/analysts.md) |  |
| 54 | `analystSignInReady` | read [teams](/code/tables/teams.md) |  |
| 73 | `analystSignInTeamMethods` | read [analyst_teams](/code/tables/analyst_teams.md), read [teams](/code/tables/teams.md), read [auth_providers](/code/tables/auth_providers.md) |  |
| 134 | `analystSignInApply` | read [analysts](/code/tables/analysts.md) |  |
| 150 | `analystSignInApply` | **update** [analysts](/code/tables/analysts.md) (`auth_provider_id`, `last_modified_datetime`) |  |
| 175 | `analystSignInTeamMemberIds` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 186 | `analystSignInFollowerIds` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Included by:** [api/system/delete_sso_provider.php](/code/files/api/system/delete_sso_provider.php.md), [api/tickets/delete_team.php](/code/files/api/tickets/delete_team.php.md), [api/tickets/get_analysts.php](/code/files/api/tickets/get_analysts.php.md), [api/tickets/get_teams.php](/code/files/api/tickets/get_teams.php.md), [api/tickets/save_analyst.php](/code/files/api/tickets/save_analyst.php.md), [api/tickets/save_analyst_teams.php](/code/files/api/tickets/save_analyst_teams.php.md), [api/tickets/save_team.php](/code/files/api/tickets/save_team.php.md), [api/tickets/save_team_analysts.php](/code/files/api/tickets/save_team_analysts.php.md), [includes/sso_claims.php](/code/files/includes/sso_claims.php.md)

