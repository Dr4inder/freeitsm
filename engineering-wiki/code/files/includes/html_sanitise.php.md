# includes/html_sanitise.php

> PHP - 164 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [sanitiseUserHtml()](/code/functions/sanitiseUserHtml.md) | 53 | Clean customer-authored HTML down to the allow-list. |
| [sanitiseUserHtmlNode()](/code/functions/sanitiseUserHtmlNode.md) | 101 | Walk a node's children, removing or unwrapping anything not allow-listed. Iterates over a SNAPSHOT of the child list because the loop mutates it. |

## How it hangs together

**Included by:** [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md)

