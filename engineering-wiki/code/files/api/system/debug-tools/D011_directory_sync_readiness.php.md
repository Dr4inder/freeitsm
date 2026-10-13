# api/system/debug-tools/D011_directory_sync_readiness.php

> API endpoint - 583 lines

Debug Tool D011 — Why can't this sign-in method import people?

D010 asks "can anybody sign in with this?". This asks a different question of
the same rows: "could this bring people in from the directory, and if not,
what exactly is in the way?"

They are genuinely separate. A directory can be set up purely as a source of
people — so staff exist to be issued equipment — with single sign-on switched
off entirely. Nothing in the import path consults the global SSO switch. The
two get confused because both live on a screen called Authentication, under a
heading called Sign-in methods.

The tool walks the gates in the order the code actually applies them and names
THE blocker rather than listing everything that happens to be unset. It also
reports the one disagreement in the codebase worth knowing about: running an
import from the UI ignores the provider's Enabled flag, and the scheduled run
does not — so a directory that imports perfectly when you press the button can
be silently skipped every night.

Read-only, and it does NOT contact the directory: this is about configuration,
not reachability, and a tool that hangs on an unreachable host answers nothing.
Every DN, bind account and filter value is masked so the report can be sent on.

Output: plain text, section-delimited with === HEADERS ===.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D011_directory_sync_readiness.php` |
| Protected by | Signed-in analyst (session check) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 53 |  |
| [yn()](/code/functions/yn.md) | 57 |  |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 58 |  |
| [mask()](/code/functions/mask.md) | 64 |  |
| [maskDn()](/code/functions/maskDn.md) | 79 | Keep the attribute NAMES and the shape of the tree; mask every value. |
| [maskDnList()](/code/functions/maskDnList.md) | 91 |  |
| [colExists()](/code/functions/colExists.md) | 121 |  |
| [tableExists()](/code/functions/tableExists.md) | 129 |  |
| [storedValue()](/code/functions/storedValue.md) | 266 | Describe what is actually stored, keeping the three "blank" cases apart: the column is absent, the value is NULL, or the value is an empty string. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 310 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 358 |  | **update** [auth_providers](/code/tables/auth_providers.md) (`protocol`) |  |
| 507 |  | read [directory_sync_runs](/code/tables/directory_sync_runs.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/directory_sync.php](/code/files/includes/directory_sync.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dsyncAttr()](/code/functions/dsyncAttr.md), [dsyncFlavour()](/code/functions/dsyncFlavour.md), [dsyncScopes()](/code/functions/dsyncScopes.md)

