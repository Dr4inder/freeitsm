# includes/domains/monitor.php

> PHP - 97 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainWatchedFields()](/code/functions/domainWatchedFields.md) | 21 | The fields compared, and a label key for each (lang: domains.watch.<key>). |
| [domainBaseline()](/code/functions/domainBaseline.md) | 30 | Build the baseline from a domain row plus the check snapshot. |
| [domainBaselineDiff()](/code/functions/domainBaselineDiff.md) | 58 | What changed between the previous baseline and this one. |
| [domainBaselineMerge()](/code/functions/domainBaselineMerge.md) | 77 | Keep the previous value of a field when this run could not see it, so a one-off gap never erases what we knew (and never makes tomorrow's reappearance look like a change). |
| [domainChangeIsSerious()](/code/functions/domainChangeIsSerious.md) | 89 | Is this change one that should wake somebody up (vs. merely be recorded)? |

## How it hangs together

**Included by:** [includes/services/domains.php](/code/files/includes/services/domains.php.md)

