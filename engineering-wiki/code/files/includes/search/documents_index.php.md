# includes/search/documents_index.php

> PHP - 281 lines

Getting attached documents into search (discussion #76).

🔑 WHY THIS IS NOT PART OF THE ATTACHMENT QUEUE. Email attachments already have
an extraction pipeline, and it looks reusable until you read what it does with
the result: it walks attachment → email → TICKET and re-indexes the whole
ticket, because an attachment's text belongs to the ticket's corpus row. An
attached document has no ticket. It is its own row, whose visibility comes from
whatever it is attached to.

So the two pipelines share the part that is genuinely the same — the extractor,
`attTextExtractFile()`, which takes a path and gives back text — and keep their
own queues, because "what do I do once I have the text" is a different answer.
A single table would also have needed a composite primary key, since a document
id and an email-attachment id are both small integers from different tables.

⚠️ A LINK CANNOT BE INDEXED. There is no document, only a URL. A linked
document is findable by its title and description and nothing else, which
quietly makes the description field load-bearing — worth saying in the UI
rather than labelling it "optional".

⚠️ CONFIGURED IS NOT AVAILABLE. A file whose extractor is unreachable stays
`pending` and is retried; it never becomes `failed`. That distinction is the
whole reason a stuck queue is visible instead of looking like an empty one.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [documentTextReadable()](/code/functions/documentTextReadable.md) | 44 | Can ANYTHING read this file — either tier? |
| [documentTextEnqueue()](/code/functions/documentTextEnqueue.md) | 57 | Queue a document for text extraction. |
| [documentTextQueueDepth()](/code/functions/documentTextQueueDepth.md) | 80 | How many documents are waiting for their text. Drives the "indexing" state. |
| [searchIndexDocument()](/code/functions/searchIndexDocument.md) | 99 | Put one document into the search corpus. |
| [searchUnindexDocument()](/code/functions/searchUnindexDocument.md) | 144 | Drop a document from the index — used when its last link goes. |
| [documentTextDrain()](/code/functions/documentTextDrain.md) | 158 | Extract text for up to `$limit` queued documents, then index each one. |
| [documentSearchVisibilityClause()](/code/functions/documentSearchVisibilityClause.md) | 267 | The SQL that stops search returning a document you may not see. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 68 | `documentTextEnqueue` | **insert** [document_text](/code/tables/document_text.md) (`document_id`, `status`, `extracted_datetime`) |  |
| 83 | `documentTextQueueDepth` | read [document_text](/code/tables/document_text.md) |  |
| 104 | `searchIndexDocument` | read [documents](/code/tables/documents.md), read [document_text](/code/tables/document_text.md) |  |
| 166 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`) |  |
| 171 | `documentTextDrain` | read [document_text](/code/tables/document_text.md), read [documents](/code/tables/documents.md) |  |
| 191 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`, `extracted_datetime`) |  |
| 235 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`, `extractor`, `extracted_text`, `chars`, `extracted_datetime`) |  |
| 276 | `documentSearchVisibilityClause` | read [documents](/code/tables/documents.md) |  |

## How it hangs together

**Includes:** [includes/search/corpus.php](/code/files/includes/search/corpus.php.md), [includes/search/extract.php](/code/files/includes/search/extract.php.md), [includes/search/tika.php](/code/files/includes/search/tika.php.md), [includes/documents.php](/code/files/includes/documents.php.md)

**Included by:** [api/documents/attach.php](/code/files/api/documents/attach.php.md), [api/documents/save.php](/code/files/api/documents/save.php.md), [api/documents/unlink.php](/code/files/api/documents/unlink.php.md), [api/system/global_search.php](/code/files/api/system/global_search.php.md), [includes/search/search.php](/code/files/includes/search/search.php.md)

**Calls:** [attTextExtractFile()](/code/functions/attTextExtractFile.md), [attTextSupports()](/code/functions/attTextSupports.md), [documentStoragePath()](/code/functions/documentStoragePath.md), [documentVisibilityClause()](/code/functions/documentVisibilityClause.md), [searchCorpusDelete()](/code/functions/searchCorpusDelete.md), [searchCorpusReady()](/code/functions/searchCorpusReady.md), [searchCorpusTicketScope()](/code/functions/searchCorpusTicketScope.md), [searchCorpusUpsert()](/code/functions/searchCorpusUpsert.md), [tikaConfigured()](/code/functions/tikaConfigured.md), [tikaExtract()](/code/functions/tikaExtract.md), [tikaHandles()](/code/functions/tikaHandles.md)

