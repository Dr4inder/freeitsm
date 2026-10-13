# includes/engineering_wiki/markdown.php

> PHP - 406 lines

## Classes

- [EwMarkdown](/code/classes/EwMarkdown.md) (class, line 24) - Engineering wiki - a small Markdown renderer written for the wiki, so the pages look and read like GitHub without pulling in a library.

## How it hangs together

**Included by:** [includes/engineering_wiki/store.php](/code/files/includes/engineering_wiki/store.php.md)

## Traps

> [!WARNING]
> **Line 2:** raw HTML in a page is NEVER passed through - every character of text is escaped. The pages are files a developer edits, and a generated page quotes code comments, so treating any of it as HTML would let a comment run script in an administrator's browser. Anything that needs markup gets a Markdown form.

