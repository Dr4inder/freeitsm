# documentTextDrain()

Extract text for up to `$limit` queued documents, then index each one.

Mirrors the attachment queue's discipline: claim rows before working on them
so two workers cannot collide, return abandoned claims to the queue, and stop
the moment the extractor looks unreachable rather than grinding through a
batch collecting timeouts.

```php
function documentTextDrain(PDO $conn, int $limit = 5, float $deadline = 0): array
```

Defined in [includes/search/documents_index.php](/code/files/includes/search/documents_index.php.md), line 158.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$limit` | `int` | `5` |  |
| `$deadline` | `float` | `0` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 166 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`) |  |
| 171 | `documentTextDrain` | read [document_text](/code/tables/document_text.md), read [documents](/code/tables/documents.md) |  |
| 191 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`, `extracted_datetime`) |  |
| 235 | `documentTextDrain` | **update** [document_text](/code/tables/document_text.md) (`status`, `extractor`, `extracted_text`, `chars`, `extracted_datetime`) |  |

## Calls

[attTextExtractFile()](/code/functions/attTextExtractFile.md), [attTextSupports()](/code/functions/attTextSupports.md), [documentStoragePath()](/code/functions/documentStoragePath.md), [documentTextQueueDepth()](/code/functions/documentTextQueueDepth.md), [searchIndexDocument()](/code/functions/searchIndexDocument.md), [tikaExtract()](/code/functions/tikaExtract.md)

## Called from

- [api/documents/save.php](/code/files/api/documents/save.php.md)

