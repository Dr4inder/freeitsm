# EwScanner

> Class in [includes/engineering_wiki/scanner.php](/code/files/includes/engineering_wiki/scanner.php.md), line 29

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) | Sets the app root, the output folder (engineering-wiki/code) and the folder that holds the scan state. |
| [step()](#step) | Do up to `$seconds` of work. Call again until 'done' is true. |
| [runAll()](#runall) | Run to the end (command line). |
| [report()](#report) | Builds the progress answer `step()` returns - phase, files done of total, files changed, pages written and a message. |
| [ensureDirs()](#ensuredirs) | Creates the output and state folders if needed; throws when the web server cannot write to them. |
| [phaseList()](#phaselist) | Phase 1 - walks the app and queues every file that is new or whose size or SHA-1 changed since the manifest, and drops deleted files from it. |
| [walk()](#walk) | Calls `$fn` for every .php and .js file under a folder, skipping SKIP_DIRS, hidden folders, folders whose .htaccess denies all, minified scripts and files over 1.5 MB. |
| [phaseParse()](#phaseparse) | Phase 2 - parses queued files until the time budget runs out, storing each file's parse in the manifest and saving progress every few seconds. |
| [parsePhp()](#parsephp) | Everything worth knowing about one PHP file. |
| [hasModifier()](#hasmodifier) | True when the declaration at token `$i` carries the given modifier (static, abstract...) among the few tokens before it. |
| [visibility()](#visibility) | Returns 'public', 'protected' or 'private' for the declaration at token `$i`, or '' when none is written. |
| [params()](#params) | The parameters between ( and the matching ). `@return` array{0:array,1:int} [params, index of ")"] |
| [tidyParams()](#tidyparams) | Trims each parsed parameter's type and default (whitespace in a default collapsed to single spaces). |
| [evalPath()](#evalpath) | Work out the file an include points at: string pieces, __DIR__, dirname(__DIR__[, n]). |
| [normalise()](#normalise) | Resolves '.' and '..' in a relative path; null when it climbs above the app root or ends up empty. |
| [resolveRel()](#resolverel) | Resolves a script src or link found in a page to a path from the app root; null for external URLs and PHP-built paths. |
| [sqlOf()](#sqlof) | Is this string SQL? Which tables does it read and which does it write (with the columns written)? |
| [parseDoc()](#parsedoc) | A /** doc comment * / split into summary, body and `@tags`. |
| [lineDoc()](#linedoc) | A run of // lines, or a plain block comment, used as a description when there is no doc comment. Decorative rules (// ----, // ====) and a lone TRAP are not descriptions. |
| [trapText()](#traptext) | Cleans a TRAP: comment down to its text - comment markers stripped, from "TRAP:" to the end of its paragraph, on one line. |
| [parseJs()](#parsejs) | JavaScript: its functions (with /** comments) and the API endpoints it calls. |
| [phaseWrite()](#phasewrite) | Phase 3 - builds every page (files, functions, classes, tables, indexes, endpoints, traps) from the manifest, writes only those that changed and deletes pages no longer produced. |
| [cleanEmptyDirs()](#cleanemptydirs) | Removes empty folders under the output, keeping _scan; returns true when the folder itself is empty. |
| [matchEndpoint()](#matchendpoint) | "api/tickets/save.php" from a JS reference like "../api/tickets/save.php" or "api/tickets/save.php". |
| [link()](#link) | A Markdown link to a wiki page. |
| [fileLink()](#filelink) | A link to a file's page. |
| [fnLink()](#fnlink) | A link to a function's page, labelled `name()`. |
| [tableLink()](#tablelink) | A link to a table's page. |
| [fnSlug()](#fnslug) | A function or class name made safe for a page file name. |
| [mdText()](#mdtext) | Text safe inside a link label or table cell. |
| [cell()](#cell) | Text made safe for a Markdown table cell - pipes escaped, line breaks flattened. |
| [code()](#code) | Text as inline code (any backtick inside becomes a quote). |
| [docMd()](#docmd) | A parsed doc comment as Markdown - the wiki link box, then the summary (optional) and the body. |
| [wikiLinks()](#wikilinks) | The GitHub wiki pages a comment points at, as a box that stands out at the top of the page - a LINK only; the wiki's text is never copied into FreeITSM. From "@wiki Page-Name" (or a full URL) and from any github.com/edmozley/freeitsm/wiki/... link already written in the comment. |
| [prose()](#prose) | Comment prose into Markdown: keep paragraphs and lists, stop "*" and "_" in code-ish text turning into emphasis. |
| [signature()](#signature) | A function's signature as written, wrapped one parameter per line when it is over 100 characters. |
| [paramsTable()](#paramstable) | The parameters table - name, type, default, and the meaning from its `@param` tag. |
| [tagRows()](#tagrows) | The doc comment's tags of the wanted kinds, as [tag, value] pairs. |
| [filePage()](#filepage) | Builds a file's page - its description, the endpoint box for an API file, its functions and classes, its SQL, what it includes and is included by, what it calls, and its traps. |
| [guardText()](#guardtext) | How an endpoint is protected: the checks it makes itself, else the ones made by a file it includes (a shared bootstrap like includes/files/api_bootstrap.php), at the top level of that file - a check inside a function only guards that function's callers. |
| [guardsOf()](#guardsof) | The sign-in and permission checks a file makes at its top level (admin guard, module access, capability), each suffixed with `$via`. |
| [sqlMd()](#sqlmd) | The Database table for a list of queries - line, function, tables read or written (with columns), and the SQL: note. |
| [trapsMd()](#trapsmd) | The Traps section - each trap as a warning box with its line and function. |
| [seeLink()](#seelink) | An `@see` value as a file link when it names a file in the app, otherwise as code. |
| [functionPage()](#functionpage) | Builds a function's page - description, signature, parameters, return, the tables it touches (warning when the comment names one its SQL does not), what it calls, its callers and its traps. |
| [classPage()](#classpage) | Builds a class's page - its description, then each method with its signature, parameters, tags, SQL and callers. |
| [tablePage()](#tablepage) | Builds a table's page - its columns from the schema with their comments, then who writes it and who reads it. |
| [indexPage()](#indexpage) | Builds the Code map front page - counts of files, endpoints, functions, classes, tables and traps, with links. |
| [functionsIndex()](#functionsindex) | Builds the A-Z list of functions outside classes, with file and summary. |
| [classesIndex()](#classesindex) | Builds the list of classes, with file, method count and summary. |
| [tablesIndex()](#tablesindex) | Builds the list of tables, with column count, how many files read and write each, and the first sentence of its note. |
| [filesIndex()](#filesindex) | Builds the files index - a count per top folder, then the top-level files with their summaries. |
| [endpointsPage()](#endpointspage) | Builds the API endpoints page - every api/ PHP file by folder, with its protection, summary and the scripts that call it. |
| [trapsPage()](#trapspage) | Builds the page listing every TRAP: comment, file by file. |
| [loadSchema()](#loadschema) | Loads the table definitions from includes/db_verify_schema.php, with the comments written above each table and above or beside each column as notes. |
| [loadManifest()](#loadmanifest) | Loads the saved manifest, unless it was written by a different VERSION of the scanner (which forces a full re-read). |
| [saveManifest()](#savemanifest) | Saves the manifest. |
| [saveState()](#savestate) | Saves the scan's progress; a finished scan saves an empty state. |
| [readJson()](#readjson) | Reads a JSON file from the state folder, or `$default` when it is missing or unreadable. |
| [writeJson()](#writejson) | Writes a JSON file to the state folder through a temporary file and a rename, so a reader never sees half a file. |
| [lastScan()](#lastscan) | When the last scan finished, and what it did - for the reader's Rescan button. |

### __construct

*public* - line 46

Sets the app root, the output folder (engineering-wiki/code) and the folder that holds the scan state.

```php
function __construct()
```

### step

*public* - line 59

Do up to `$seconds` of work. Call again until 'done' is true.

```php
function step(float $seconds = 8.0, bool $fresh = false): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$seconds` | `float` | `8.0` |  |
| `$fresh` | `bool` | `false` |  |

**Returns:** array{done:bool, phase:string, done_files:int, total_files:int, changed:int, message:string}

### runAll

*public* - line 85

Run to the end (command line).

```php
function runAll(?callable $progress = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$progress` | `?callable` | `null` |  |

### report

*private* - line 97

Builds the progress answer `step()` returns - phase, files done of total, files changed, pages written and a message.

```php
function report(string $phase, string $message): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$phase` | `string` |  |  |
| `$message` | `string` |  |  |

### ensureDirs

*private* - line 111

Creates the output and state folders if needed; throws when the web server cannot write to them.

```php
function ensureDirs(): void
```

### phaseList

*private* - line 124

Phase 1 - walks the app and queues every file that is new or whose size or SHA-1 changed since the manifest, and drops deleted files from it.

```php
function phaseList(): void
```

### walk

*private* - line 153

Calls `$fn` for every .php and .js file under a folder, skipping SKIP_DIRS, hidden folders, folders whose .htaccess denies all, minified scripts and files over 1.5 MB.

```php
function walk(string $abs, string $rel, callable $fn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$abs` | `string` |  |  |
| `$rel` | `string` |  |  |
| `$fn` | `callable` |  |  |

### phaseParse

*private* - line 175

Phase 2 - parses queued files until the time budget runs out, storing each file's parse in the manifest and saving progress every few seconds.

```php
function phaseParse(): void
```

### parsePhp

*private* - line 195

Everything worth knowing about one PHP file.

```php
function parsePhp(string $src, string $rel): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$src` | `string` |  |  |
| `$rel` | `string` |  |  |

### hasModifier

*private* - line 429

True when the declaration at token `$i` carries the given modifier (static, abstract...) among the few tokens before it.

```php
function hasModifier(array $tokens, int $i, callable $sig, int $mod): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tokens` | `array` |  |  |
| `$i` | `int` |  |  |
| `$sig` | `callable` |  |  |
| `$mod` | `int` |  |  |

### visibility

*private* - line 440

Returns 'public', 'protected' or 'private' for the declaration at token `$i`, or '' when none is written.

```php
function visibility(array $tokens, int $i, callable $sig): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tokens` | `array` |  |  |
| `$i` | `int` |  |  |
| `$sig` | `callable` |  |  |

### params

*private* - line 453

The parameters between ( and the matching ). `@return` array{0:array,1:int} [params, index of ")"]

```php
function params(array $tokens, int $open): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tokens` | `array` |  |  |
| `$open` | `int` |  |  |

### tidyParams

*private* - line 478

Trims each parsed parameter's type and default (whitespace in a default collapsed to single spaces).

```php
function tidyParams(array $ps): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ps` | `array` |  |  |

### evalPath

*private* - line 485

Work out the file an include points at: string pieces, __DIR__, dirname(__DIR__[, n]).

```php
function evalPath(array $expr, string $rel): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$expr` | `array` |  |  |
| `$rel` | `string` |  |  |

### normalise

*private* - line 523

Resolves '.' and '..' in a relative path; null when it climbs above the app root or ends up empty.

```php
function normalise(string $path): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |

### resolveRel

*private* - line 537

Resolves a script src or link found in a page to a path from the app root; null for external URLs and PHP-built paths.

```php
function resolveRel(string $from, string $href): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$from` | `string` |  |  |
| `$href` | `string` |  |  |

### sqlOf

*private* - line 547

Is this string SQL? Which tables does it read and which does it write (with the columns written)?

```php
function sqlOf(string $s): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### parseDoc

*private* - line 574

A /** doc comment * / split into summary, body and `@tags`.

```php
function parseDoc(string $raw): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

### lineDoc

*private* - line 596

A run of // lines, or a plain block comment, used as a description when there is no doc comment. Decorative rules (// ----, // ====) and a lone TRAP are not descriptions.

```php
function lineDoc(array $comments): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$comments` | `array` |  |  |

### trapText

*private* - line 619

Cleans a TRAP: comment down to its text - comment markers stripped, from "TRAP:" to the end of its paragraph, on one line.

```php
function trapText(string $raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

### parseJs

*private* - line 637

JavaScript: its functions (with /** comments) and the API endpoints it calls.

```php
function parseJs(string $src, string $rel): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$src` | `string` |  |  |
| `$rel` | `string` |  |  |

### phaseWrite

*private* - line 698

Phase 3 - builds every page (files, functions, classes, tables, indexes, endpoints, traps) from the manifest, writes only those that changed and deletes pages no longer produced.

```php
function phaseWrite(): void
```

### cleanEmptyDirs

*private* - line 794

Removes empty folders under the output, keeping _scan; returns true when the folder itself is empty.

```php
function cleanEmptyDirs(string $dir): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dir` | `string` |  |  |

### matchEndpoint

*private* - line 807

"api/tickets/save.php" from a JS reference like "../api/tickets/save.php" or "api/tickets/save.php".

```php
function matchEndpoint(string $e, array $files): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$e` | `string` |  |  |
| `$files` | `array` |  |  |

### link

*private* - line 816

A Markdown link to a wiki page.

```php
function link(string $page, string $label): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$page` | `string` |  |  |
| `$label` | `string` |  |  |

### fileLink

*private* - line 818

A link to a file's page.

```php
function fileLink(string $rel, ?string $label = null): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rel` | `string` |  |  |
| `$label` | `?string` | `null` |  |

### fnLink

*private* - line 820

A link to a function's page, labelled `name()`.

```php
function fnLink(string $name): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |

### tableLink

*private* - line 822

A link to a table's page.

```php
function tableLink(string $t): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |

### fnSlug

*private* - line 824

A function or class name made safe for a page file name.

```php
function fnSlug(string $name): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |

### mdText

*private* - line 826

Text safe inside a link label or table cell.

```php
function mdText(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### cell

*private* - line 828

Text made safe for a Markdown table cell - pipes escaped, line breaks flattened.

```php
function cell(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### code

*private* - line 830

Text as inline code (any backtick inside becomes a quote).

```php
function code(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### docMd

*private* - line 833

A parsed doc comment as Markdown - the wiki link box, then the summary (optional) and the body.

```php
function docMd(?array $doc, bool $withSummary = true): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `?array` |  |  |
| `$withSummary` | `bool` | `true` |  |

### wikiLinks

*private* - line 848

The GitHub wiki pages a comment points at, as a box that stands out at the top of the page - a LINK only; the wiki's text is never copied into FreeITSM. From "@wiki Page-Name" (or a full URL) and from any github.com/edmozley/freeitsm/wiki/... link already written in the comment.

```php
function wikiLinks(array $doc): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `array` |  |  |

### prose

*private* - line 867

Comment prose into Markdown: keep paragraphs and lists, stop "*" and "_" in code-ish text turning into emphasis.

```php
function prose(string $t): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |

### signature

*private* - line 876

A function's signature as written, wrapped one parameter per line when it is over 100 characters.

```php
function signature(array $fn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `array` |  |  |

### paramsTable

*private* - line 887

The parameters table - name, type, default, and the meaning from its `@param` tag.

```php
function paramsTable(array $fn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `array` |  |  |

### tagRows

*private* - line 903

The doc comment's tags of the wanted kinds, as [tag, value] pairs.

```php
function tagRows(?array $doc, array $want): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `?array` |  |  |
| `$want` | `array` |  |  |

### filePage

*private* - line 913

Builds a file's page - its description, the endpoint box for an API file, its functions and classes, its SQL, what it includes and is included by, what it calls, and its traps.

```php
function filePage(
    string $rel,
    array $d,
    array $includedBy,
    array $jsCallers,
    array $usedBy,
    array $tableSet,
    array $fnIndex
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rel` | `string` |  |  |
| `$d` | `array` |  |  |
| `$includedBy` | `array` |  |  |
| `$jsCallers` | `array` |  |  |
| `$usedBy` | `array` |  |  |
| `$tableSet` | `array` |  |  |
| `$fnIndex` | `array` |  |  |

### guardText

*private* - line 979

How an endpoint is protected: the checks it makes itself, else the ones made by a file it includes (a shared bootstrap like includes/files/api_bootstrap.php), at the top level of that file - a check inside a function only guards that function's callers.

```php
function guardText(string $rel, array $d): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rel` | `string` |  |  |
| `$d` | `array` |  |  |

### guardsOf

*private* - line 1006

The sign-in and permission checks a file makes at its top level (admin guard, module access, capability), each suffixed with `$via`.

```php
function guardsOf(array $d, string $via): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `array` |  |  |
| `$via` | `string` |  |  |

### sqlMd

*private* - line 1025

The Database table for a list of queries - line, function, tables read or written (with columns), and the SQL: note.

```php
function sqlMd(array $sql, array $tableSet): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$sql` | `array` |  |  |
| `$tableSet` | `array` |  |  |

### trapsMd

*private* - line 1040

The Traps section - each trap as a warning box with its line and function.

```php
function trapsMd(array $traps): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$traps` | `array` |  |  |

### seeLink

*private* - line 1049

An `@see` value as a file link when it names a file in the app, otherwise as code.

```php
function seeLink(string $v): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` | `string` |  |  |

### functionPage

*private* - line 1059

Builds a function's page - description, signature, parameters, return, the tables it touches (warning when the comment names one its SQL does not), what it calls, its callers and its traps.

```php
function functionPage(
    array $defs,
    array $callers,
    array $files,
    array $tableSet,
    array $fnIndex
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$defs` | `array` |  |  |
| `$callers` | `array` |  |  |
| `$files` | `array` |  |  |
| `$tableSet` | `array` |  |  |
| `$fnIndex` | `array` |  |  |

### classPage

*private* - line 1108

Builds a class's page - its description, then each method with its signature, parameters, tags, SQL and callers.

```php
function classPage(string $cls, array $c, array $callers, array $files, array $tableSet): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cls` | `string` |  |  |
| `$c` | `array` |  |  |
| `$callers` | `array` |  |  |
| `$files` | `array` |  |  |
| `$tableSet` | `array` |  |  |

### tablePage

*private* - line 1135

Builds a table's page - its columns from the schema with their comments, then who writes it and who reads it.

```php
function tablePage(string $t, array $def, array $use): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |
| `$def` | `array` |  |  |
| `$use` | `array` |  |  |

### indexPage

*private* - line 1164

Builds the Code map front page - counts of files, endpoints, functions, classes, tables and traps, with links.

```php
function indexPage(array $files, array $fnIndex, array $classIndex, array $schema): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |
| `$fnIndex` | `array` |  |  |
| `$classIndex` | `array` |  |  |
| `$schema` | `array` |  |  |

### functionsIndex

*private* - line 1182

Builds the A-Z list of functions outside classes, with file and summary.

```php
function functionsIndex(array $fnIndex): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fnIndex` | `array` |  |  |

### classesIndex

*private* - line 1198

Builds the list of classes, with file, method count and summary.

```php
function classesIndex(array $classIndex): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$classIndex` | `array` |  |  |

### tablesIndex

*private* - line 1212

Builds the list of tables, with column count, how many files read and write each, and the first sentence of its note.

```php
function tablesIndex(array $schema, array $use): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$schema` | `array` |  |  |
| `$use` | `array` |  |  |

### filesIndex

*private* - line 1225

Builds the files index - a count per top folder, then the top-level files with their summaries.

```php
function filesIndex(array $files): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |

### endpointsPage

*private* - line 1241

Builds the API endpoints page - every api/ PHP file by folder, with its protection, summary and the scripts that call it.

```php
function endpointsPage(array $files, array $jsCallers): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |
| `$jsCallers` | `array` |  |  |

### trapsPage

*private* - line 1259

Builds the page listing every TRAP: comment, file by file.

```php
function trapsPage(array $files): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |

### loadSchema

*private* - line 1279

Loads the table definitions from includes/db_verify_schema.php, with the comments written above each table and above or beside each column as notes.

```php
function loadSchema(): array
```

**Returns:** array<string, array{note:string, columns:array<string,array{def:string,note:string}>}>

### loadManifest

*private* - line 1328

Loads the saved manifest, unless it was written by a different VERSION of the scanner (which forces a full re-read).

```php
function loadManifest(): void
```

### saveManifest

*private* - line 1334

Saves the manifest.

```php
function saveManifest(): void
```

### saveState

*private* - line 1336

Saves the scan's progress; a finished scan saves an empty state.

```php
function saveState(): void
```

### readJson

*private* - line 1338

Reads a JSON file from the state folder, or `$default` when it is missing or unreadable.

```php
function readJson(string $name, $default)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$default` |  |  |  |

### writeJson

*private* - line 1346

Writes a JSON file to the state folder through a temporary file and a rename, so a reader never sees half a file.

```php
function writeJson(string $name, $data): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$data` |  |  |  |

### lastScan

*public static* - line 1354

When the last scan finished, and what it did - for the reader's Rescan button.

```php
function lastScan(): ?array
```

