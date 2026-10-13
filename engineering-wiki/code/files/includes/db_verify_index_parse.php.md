# includes/db_verify_index_parse.php

> PHP - 106 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [dbVerifyParseIndexesFromSql()](/code/functions/dbVerifyParseIndexesFromSql.md) | 28 | Extract every named secondary index from freeitsm.sql text: [table, name, type, columns]. Skips PRIMARY KEY, FOREIGN KEY, CONSTRAINT. |
| [dbVerifyIndexTypeOf()](/code/functions/dbVerifyIndexTypeOf.md) | 54 | Normalise an index type from either list format. |
| [dbVerifyIndexListSelfCheck()](/code/functions/dbVerifyIndexListSelfCheck.md) | 67 | Compare the committed generated list against a fresh parse of freeitsm.sql. Returns human-readable problem strings; an empty array means they're in sync. |

## How it hangs together

**Included by:** [api/system/db_verify.php](/code/files/api/system/db_verify.php.md)

