# includes/engineering_wiki/scanner.php

> PHP - 1178 lines

Engineering wiki - the scanner that writes the Code map (engineering-wiki/code/).

It reads FreeITSM's own PHP and JavaScript and writes one Markdown page per file,
function, class and database table, plus indexes, the API endpoint list and every
TRAP: comment. It has no AI: it works from PHP's own tokenizer, the SQL strings it
finds, the schema in includes/db_verify_schema.php, and comments written to the
convention in engineering-wiki/handbook/comments.md.

It is INCREMENTAL and RESUMABLE. What it learnt about each file is kept in
code/_scan/manifest.json with that file's modified time, size and SHA-1; a rescan
re-reads only files whose fingerprint changed, picks up new files and forgets
deleted ones. The work runs in steps (list -> parse -> write) under a time budget,
and the queue is saved after every batch, so a scan stopped half way - a closed
tab, a timed-out request - carries on from where it stopped.

Run it from System -> Engineering wiki (Rescan), or from the command line:
  php scripts/engineering-wiki-scan.php

TRAP: the manifest is machine-specific (modified times differ per checkout), so it
is never shipped - only the pages are. A fresh install's first Rescan re-reads
everything once; the SHA-1 check stops a mere change of modified time from
counting as a change after that.

## Classes

- [EwScanner](/code/classes/EwScanner.md) (class, line 29)

## How it hangs together

**Includes:** [includes/engineering_wiki/store.php](/code/files/includes/engineering_wiki/store.php.md)

**Calls:** [ewRoot()](/code/functions/ewRoot.md)

