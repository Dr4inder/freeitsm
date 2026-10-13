# includes/search/extract.php

> PHP - 216 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [attTextExtension()](/code/functions/attTextExtension.md) | 89 | The extension, lowercased, or '' if there isn't one. |
| [attTextSupports()](/code/functions/attTextSupports.md) | 95 | Could this tier read the file at all? Used to answer before opening anything. |
| [attTextNormalise()](/code/functions/attTextNormalise.md) | 107 | Reduce extracted XML/text to the words worth indexing. |
| [attTextExtractFile()](/code/functions/attTextExtractFile.md) | 124 | Read the text of one file. |
| [attTextExtractOoxml()](/code/functions/attTextExtractOoxml.md) | 175 | Text out of a docx/xlsx/pptx. Returns null if the archive cannot be opened. |

## How it hangs together

**Included by:** [api/system/search_status.php](/code/files/api/system/search_status.php.md), [includes/search/documents_index.php](/code/files/includes/search/documents_index.php.md), [includes/search/indexer.php](/code/files/includes/search/indexer.php.md), [includes/search/tika.php](/code/files/includes/search/tika.php.md)

