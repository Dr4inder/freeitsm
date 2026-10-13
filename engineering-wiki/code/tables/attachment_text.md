# attachment_text

Text pulled out of an attachment (discussion #53). The DURABLE record — search_documents holds a derived copy. See freeitsm.sql for why that distinction matters. ⚠️ Its PK is attachment_id, not `id`, so it must also be listed in `$primaryKeys` in api/system/db_verify.php.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `attachment_id` | `INT NOT NULL` |  |
| `status` | `VARCHAR(16) NOT NULL` |  |
| `extractor` | `VARCHAR(20) NULL` |  |
| `extracted_text` | `LONGTEXT NULL` |  |
| `chars` | `INT NOT NULL DEFAULT 0` |  |
| `extracted_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md):105 |  | update | `status` |  |
| [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md):113 | `extractQueueDrain` | update | `status` |  |
| [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md):123 | `extractQueueDrain` | update | `status` |  |
| [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md):153 | `extractQueueDrain` | update | `status`, `extracted_datetime` |  |
| [includes/search/indexer.php](/code/files/includes/search/indexer.php.md):269 | `searchIndexTicketAttachments` | insert | `attachment_id`, `status`, `extractor`, `extracted_text`, `chars`, `extracted_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/search_status.php](/code/files/api/system/search_status.php.md) | L91, L102 |  |
| [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md) | L92 |  |
| [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md) | extractQueueDepth L59, extractQueueDrain L101, extractQueueDrain L131, extractQueueDrain L166, extractQueueDepthUnchanged L216 |  |
| [includes/search/indexer.php](/code/files/includes/search/indexer.php.md) | searchIndexTicketAttachments L161 |  |

