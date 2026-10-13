# includes/rfp_docx_parser.php

> PHP - 125 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rfpExtractDocxText()](/code/functions/rfpExtractDocxText.md) | 13 | Extract plain text from a .docx file using ZipArchive + DOMDocument. No external dependencies required. |
| [rfpDocxIsInsideTable()](/code/functions/rfpDocxIsInsideTable.md) | 84 | True if the given element has any <w:tbl> ancestor. Used to skip paragraphs that are inside table cells during the paragraph pass, so they don't get double-counted. |
| [rfpDocxParagraphText()](/code/functions/rfpDocxParagraphText.md) | 98 | Concatenate all text runs in a single <w:p>, preserving tab characters where <w:tab/> elements appear. |

## How it hangs together

**Included by:** [api/rfp-builder/extract_document.php](/code/files/api/rfp-builder/extract_document.php.md), [api/rfp-builder/upload_document.php](/code/files/api/rfp-builder/upload_document.php.md)

