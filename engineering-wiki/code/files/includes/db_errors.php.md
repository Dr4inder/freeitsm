# includes/db_errors.php

> PHP - 46 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [dbErrorIsMissingTable()](/code/functions/dbErrorIsMissingTable.md) | 24 | "That table doesn't exist." MySQL: SQLSTATE 42S02, driver code 1146. |
| [dbErrorIsUnknownColumn()](/code/functions/dbErrorIsUnknownColumn.md) | 33 | "That column doesn't exist." MySQL: SQLSTATE 42S22, driver code 1054. |
| [dbErrorIsMissingSchema()](/code/functions/dbErrorIsMissingSchema.md) | 42 | Either of the above — the two shapes a part-migrated install actually takes. |

## How it hangs together

**Included by:** [api/system/db_verify.php](/code/files/api/system/db_verify.php.md), [includes/setup_state.php](/code/files/includes/setup_state.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md)

