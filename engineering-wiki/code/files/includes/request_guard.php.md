# includes/request_guard.php

> PHP - 93 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rejectSimpleRequestForgery()](/code/functions/rejectSimpleRequestForgery.md) | 59 | Refuse a state-changing request that declares text/plain. |

## How it hangs together

**Includes:** [includes/csrf.php](/code/files/includes/csrf.php.md)

**Included by:** [api/auth/request_password_reset.php](/code/files/api/auth/request_password_reset.php.md), [api/auth/reset_password.php](/code/files/api/auth/reset_password.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [csrfEnforce()](/code/functions/csrfEnforce.md), [csrfStartPageInjection()](/code/functions/csrfStartPageInjection.md)

