# includes/db_verify_column_parse.php

> PHP - 164 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [dbVerifyParseColumnsFromSql()](/code/functions/dbVerifyParseColumnsFromSql.md) | 43 | Extract the declared COLUMNS of every table in freeitsm.sql: ['table' => ['column' => 'NORMALISED TYPE', ...], ...] |
| [dbVerifyNormaliseColumnType()](/code/functions/dbVerifyNormaliseColumnType.md) | 79 | Reduce a column definition to a comparable shape. |
| [dbVerifyColumnSelfCheck()](/code/functions/dbVerifyColumnSelfCheck.md) | 102 | Compare includes/db_verify_schema.php against a fresh parse of freeitsm.sql. Returns human-readable problem strings; empty means they're in sync. |

## How it hangs together

**Included by:** [api/system/db_verify.php](/code/files/api/system/db_verify.php.md)

