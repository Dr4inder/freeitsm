# includes/db_verify_preview.php

> PHP - 216 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [dbPreviewTableExists()](/code/functions/dbPreviewTableExists.md) | 73 | Does this table exist? |
| [dbPreviewColumnExists()](/code/functions/dbPreviewColumnExists.md) | 81 | Does this column exist? |
| [dbPreviewIndexExists()](/code/functions/dbPreviewIndexExists.md) | 89 | Does this index exist? |
| [dbPreviewRepairs()](/code/functions/dbPreviewRepairs.md) | 119 | Row repairs db_verify.php would carry out, counted against this database. |
| [dbVerifyPreview()](/code/functions/dbVerifyPreview.md) | 152 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `dbPreviewRepairs` | read [assets](/code/tables/assets.md), read [asset_history](/code/tables/asset_history.md) |  |

## How it hangs together

**Included by:** [api/system/db_verify_preview.php](/code/files/api/system/db_verify_preview.php.md)

