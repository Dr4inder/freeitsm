# system/help/_registry.php

> PHP - 610 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [getHelpTopics()](/code/functions/getHelpTopics.md) | 31 |  |
| [getHelpTopic()](/code/functions/getHelpTopic.md) | 533 | One topic by slug, or null. Slug comes from the page (`$helpSlug`) or the URL. |
| [helpCards()](/code/functions/helpCards.md) | 549 | The help cards for the landing page: every System area that HAS a help page, in the same order as the System landing page itself. |
| [helpCardHaystack()](/code/functions/helpCardHaystack.md) | 582 | The text a card is matched against when someone searches. Lower-cased and flattened so the caller can do a single substring test: title, description, the area's own keyword synonyms, this page's standfirst, its section labels and any extra search terms. |
| [helpTopicsMissing()](/code/functions/helpTopicsMissing.md) | 599 | System areas that still have no help page — the gap this registry exists to make visible. Shown as a quiet footnote on the landing page rather than hidden, so a new area doesn't quietly ship undocumented. |

## How it hangs together

**Included by:** [system/help/index.php](/code/files/system/help/index.php.md), [system/help/_init.php](/code/files/system/help/_init.php.md)

**Calls:** [getSystemAreas()](/code/functions/getSystemAreas.md), [t()](/code/functions/t.md)

