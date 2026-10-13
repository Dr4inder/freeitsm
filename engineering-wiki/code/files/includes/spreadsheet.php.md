# includes/spreadsheet.php

> PHP - 398 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [spreadsheetRead()](/code/functions/spreadsheetRead.md) | 38 | Read an uploaded CSV or .xlsx into rows of strings (the first sheet of a workbook). Every value is a string exactly as the person sees it, trimmed. Blank rows are dropped. |
| [spreadsheetCleanText()](/code/functions/spreadsheetCleanText.md) | 65 | Strip control characters (bar tab) - a pasted line break must not reach the database. |
| [spreadsheetReadCsv()](/code/functions/spreadsheetReadCsv.md) | 78 | CSV in any of the shapes Excel saves: UTF-8 with or without a BOM, or the Windows code page; comma, semicolon (Excel in most of Europe) or tab. |
| [spreadsheetWriteCsv()](/code/functions/spreadsheetWriteCsv.md) | 121 | CSV bytes: UTF-8 with a BOM (so Excel reads accents correctly), CRLF. |
| [spreadsheetWriteXlsx()](/code/functions/spreadsheetWriteXlsx.md) | 145 | A one-sheet .xlsx. Every cell is an inline TEXT cell, never a number - that is the point (see the file header). The header row is bold and frozen. |
| [spreadsheetZipStore()](/code/functions/spreadsheetZipStore.md) | 214 | A zip with every entry STORED (no compression) - valid, and all Excel needs. |
| [spreadsheetReadXlsx()](/code/functions/spreadsheetReadXlsx.md) | 237 | The first worksheet of an .xlsx as rows of display strings. |
| [spreadsheetColIndex()](/code/functions/spreadsheetColIndex.md) | 319 | "BC12" -> 54 (zero-based column). |
| [spreadsheetInlineText()](/code/functions/spreadsheetInlineText.md) | 328 | The text of an <si> or <is>: plain <t>, or rich-text runs <r><t>. Phonetic runs are skipped. |
| [spreadsheetXml()](/code/functions/spreadsheetXml.md) | 337 |  |
| [spreadsheetZipOpen()](/code/functions/spreadsheetZipOpen.md) | 352 | Read a zip's central directory. Returns [bytes, [name => entry]]. |
| [spreadsheetZipGet()](/code/functions/spreadsheetZipGet.md) | 375 | One entry's bytes, or null when it is not there. |

## How it hangs together

**Included by:** [api/assets/leases/due_back.php](/code/files/api/assets/leases/due_back.php.md), [api/projects/export.php](/code/files/api/projects/export.php.md), [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md)

