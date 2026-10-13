# includes/feature_bingo.php

> PHP - 270 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [featureBingoCategories()](/code/functions/featureBingoCategories.md) | 55 | What kind of thing a card is, across modules (Ed: "AI, security, automation that you can also filter by"). Every card has exactly one. key => label. |
| [featureBingoModules()](/code/functions/featureBingoModules.md) | 74 | The modules cards belong to, in the order the filter lists them. key => label. |
| [featureBingoCards()](/code/functions/featureBingoCards.md) | 112 | Every card, validated. A card with a missing field or an unknown module or tier is left out and reported in `$problems`, never shown half-formed. |
| [featureBingoRunCheck()](/code/functions/featureBingoRunCheck.md) | 150 | Run one check. Returns true / false; an error (missing table or column, a malformed check) is false and is written to `$error`. |
| [featureBingoAssertReadOnly()](/code/functions/featureBingoAssertReadOnly.md) | 207 | A card's SQL is read-only by construction, and this makes sure of it: one statement, beginning SELECT. Cards are code in the repository, not user input - this guards against a mistake, not an attacker. |
| [featureBingoDismissed()](/code/functions/featureBingoDismissed.md) | 219 | The ids an administrator has marked "Not for us". |
| [featureBingoEvaluate()](/code/functions/featureBingoEvaluate.md) | 232 | Every card with its state: 'lit' (configured), 'unlit', or 'dismissed' (Not for us - out of the score, whatever its check says). Plus the totals. |
| [featureBingoReady()](/code/functions/featureBingoReady.md) | 250 | Has Database Verification created the "Not for us" table yet? |
| [featureBingoLocalDir()](/code/functions/featureBingoLocalDir.md) | 266 | Where an install keeps ITS OWN cards - for its own processes, or for a feature it has added to its copy of FreeITSM. Same format, same checks. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 165 | `featureBingoRunCheck` | read [system_settings](/code/tables/system_settings.md) |  |
| 222 | `featureBingoDismissed` | read [feature_bingo_dismissed](/code/tables/feature_bingo_dismissed.md) |  |
| 252 | `featureBingoReady` | read [feature_bingo_dismissed](/code/tables/feature_bingo_dismissed.md) |  |

## How it hangs together

**Included by:** [api/system/feature_bingo.php](/code/files/api/system/feature_bingo.php.md)

