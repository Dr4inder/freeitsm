# EwScanner

> Class in [includes/engineering_wiki/scanner.php](/code/files/includes/engineering_wiki/scanner.php.md), line 29

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) |  |
| [step()](#step) | Do up to `$seconds` of work. Call again until 'done' is true. |
| [runAll()](#runall) | Run to the end (command line). |
| [report()](#report) |  |
| [ensureDirs()](#ensuredirs) |  |
| [phaseList()](#phaselist) |  |
| [walk()](#walk) |  |
| [phaseParse()](#phaseparse) |  |
| [parsePhp()](#parsephp) | Everything worth knowing about one PHP file. |
| [hasModifier()](#hasmodifier) |  |
| [visibility()](#visibility) |  |
| [params()](#params) | The parameters between ( and the matching ). `@return` array{0:array,1:int} [params, index of ")"] |
| [tidyParams()](#tidyparams) |  |
| [evalPath()](#evalpath) | Work out the file an include points at: string pieces, __DIR__, dirname(__DIR__[, n]). |
| [normalise()](#normalise) |  |
| [resolveRel()](#resolverel) |  |
| [sqlOf()](#sqlof) | Is this string SQL? Which tables does it read and which does it write (with the columns written)? |
| [parseDoc()](#parsedoc) | A /** doc comment * / split into summary, body and `@tags`. |
| [lineDoc()](#linedoc) | A run of // lines, or a plain block comment, used as a description when there is no doc comment. Decorative rules (// ----, // ====) and a lone TRAP are not descriptions. |
| [trapText()](#traptext) |  |
| [parseJs()](#parsejs) | JavaScript: its functions (with /** comments) and the API endpoints it calls. |
| [phaseWrite()](#phasewrite) |  |
| [cleanEmptyDirs()](#cleanemptydirs) |  |
| [matchEndpoint()](#matchendpoint) | "api/tickets/save.php" from a JS reference like "../api/tickets/save.php" or "api/tickets/save.php". |
| [link()](#link) |  |
| [fileLink()](#filelink) |  |
| [fnLink()](#fnlink) |  |
| [tableLink()](#tablelink) |  |
| [fnSlug()](#fnslug) |  |
| [mdText()](#mdtext) | Text safe inside a link label or table cell. |
| [cell()](#cell) |  |
| [code()](#code) |  |
| [docMd()](#docmd) |  |
| [wikiLinks()](#wikilinks) | The GitHub wiki pages a comment points at, as a box that stands out at the top of the page - a LINK only; the wiki's text is never copied into FreeITSM. From "@wiki Page-Name" (or a full URL) and from any github.com/edmozley/freeitsm/wiki/... link already written in the comment. |
| [prose()](#prose) | Comment prose into Markdown: keep paragraphs and lists, stop "*" and "_" in code-ish text turning into emphasis. |
| [signature()](#signature) |  |
| [paramsTable()](#paramstable) |  |
| [tagRows()](#tagrows) |  |
| [filePage()](#filepage) |  |
| [guardText()](#guardtext) | How an endpoint is protected: the checks it makes itself, else the ones made by a file it includes (a shared bootstrap like includes/files/api_bootstrap.php), at the top level of that file - a check inside a function only guards that function's callers. |
| [guardsOf()](#guardsof) |  |
| [sqlMd()](#sqlmd) |  |
| [trapsMd()](#trapsmd) |  |
| [seeLink()](#seelink) |  |
| [functionPage()](#functionpage) |  |
| [classPage()](#classpage) |  |
| [tablePage()](#tablepage) |  |
| [indexPage()](#indexpage) |  |
| [functionsIndex()](#functionsindex) |  |
| [classesIndex()](#classesindex) |  |
| [tablesIndex()](#tablesindex) |  |
| [filesIndex()](#filesindex) |  |
| [endpointsPage()](#endpointspage) |  |
| [trapsPage()](#trapspage) |  |
| [loadSchema()](#loadschema) |  |
| [loadManifest()](#loadmanifest) |  |
| [saveManifest()](#savemanifest) |  |
| [saveState()](#savestate) |  |
| [readJson()](#readjson) |  |
| [writeJson()](#writejson) |  |
| [lastScan()](#lastscan) | When the last scan finished, and what it did - for the reader's Rescan button. |

### __construct

*public* - line 44

```php
function __construct()
```

### step

*public* - line 57

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

*public* - line 83

Run to the end (command line).

```php
function runAll(?callable $progress = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$progress` | `?callable` | `null` |  |

### report

*private* - line 92

```php
function report(string $phase, string $message): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$phase` | `string` |  |  |
| `$message` | `string` |  |  |

### ensureDirs

*private* - line 105

```php
function ensureDirs(): void
```

### phaseList

*private* - line 115

```php
function phaseList(): void
```

### walk

*private* - line 141

```php
function walk(string $abs, string $rel, callable $fn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$abs` | `string` |  |  |
| `$rel` | `string` |  |  |
| `$fn` | `callable` |  |  |

### phaseParse

*private* - line 160

```php
function phaseParse(): void
```

### parsePhp

*private* - line 180

Everything worth knowing about one PHP file.

```php
function parsePhp(string $src, string $rel): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$src` | `string` |  |  |
| `$rel` | `string` |  |  |

### hasModifier

*private* - line 403

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

*private* - line 413

```php
function visibility(array $tokens, int $i, callable $sig): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tokens` | `array` |  |  |
| `$i` | `int` |  |  |
| `$sig` | `callable` |  |  |

### params

*private* - line 426

The parameters between ( and the matching ). `@return` array{0:array,1:int} [params, index of ")"]

```php
function params(array $tokens, int $open): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tokens` | `array` |  |  |
| `$open` | `int` |  |  |

### tidyParams

*private* - line 450

```php
function tidyParams(array $ps): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ps` | `array` |  |  |

### evalPath

*private* - line 457

Work out the file an include points at: string pieces, __DIR__, dirname(__DIR__[, n]).

```php
function evalPath(array $expr, string $rel): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$expr` | `array` |  |  |
| `$rel` | `string` |  |  |

### normalise

*private* - line 494

```php
function normalise(string $path): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |

### resolveRel

*private* - line 505

```php
function resolveRel(string $from, string $href): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$from` | `string` |  |  |
| `$href` | `string` |  |  |

### sqlOf

*private* - line 515

Is this string SQL? Which tables does it read and which does it write (with the columns written)?

```php
function sqlOf(string $s): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### parseDoc

*private* - line 542

A /** doc comment * / split into summary, body and `@tags`.

```php
function parseDoc(string $raw): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

### lineDoc

*private* - line 564

A run of // lines, or a plain block comment, used as a description when there is no doc comment. Decorative rules (// ----, // ====) and a lone TRAP are not descriptions.

```php
function lineDoc(array $comments): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$comments` | `array` |  |  |

### trapText

*private* - line 584

```php
function trapText(string $raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

### parseJs

*private* - line 602

JavaScript: its functions (with /** comments) and the API endpoints it calls.

```php
function parseJs(string $src, string $rel): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$src` | `string` |  |  |
| `$rel` | `string` |  |  |

### phaseWrite

*private* - line 659

```php
function phaseWrite(): void
```

### cleanEmptyDirs

*private* - line 754

```php
function cleanEmptyDirs(string $dir): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dir` | `string` |  |  |

### matchEndpoint

*private* - line 767

"api/tickets/save.php" from a JS reference like "../api/tickets/save.php" or "api/tickets/save.php".

```php
function matchEndpoint(string $e, array $files): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$e` | `string` |  |  |
| `$files` | `array` |  |  |

### link

*private* - line 775

```php
function link(string $page, string $label): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$page` | `string` |  |  |
| `$label` | `string` |  |  |

### fileLink

*private* - line 776

```php
function fileLink(string $rel, ?string $label = null): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rel` | `string` |  |  |
| `$label` | `?string` | `null` |  |

### fnLink

*private* - line 777

```php
function fnLink(string $name): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |

### tableLink

*private* - line 778

```php
function tableLink(string $t): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |

### fnSlug

*private* - line 779

```php
function fnSlug(string $name): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |

### mdText

*private* - line 781

Text safe inside a link label or table cell.

```php
function mdText(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### cell

*private* - line 782

```php
function cell(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### code

*private* - line 783

```php
function code(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### docMd

*private* - line 785

```php
function docMd(?array $doc, bool $withSummary = true): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `?array` |  |  |
| `$withSummary` | `bool` | `true` |  |

### wikiLinks

*private* - line 800

The GitHub wiki pages a comment points at, as a box that stands out at the top of the page - a LINK only; the wiki's text is never copied into FreeITSM. From "@wiki Page-Name" (or a full URL) and from any github.com/edmozley/freeitsm/wiki/... link already written in the comment.

```php
function wikiLinks(array $doc): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `array` |  |  |

### prose

*private* - line 819

Comment prose into Markdown: keep paragraphs and lists, stop "*" and "_" in code-ish text turning into emphasis.

```php
function prose(string $t): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |

### signature

*private* - line 827

```php
function signature(array $fn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `array` |  |  |

### paramsTable

*private* - line 837

```php
function paramsTable(array $fn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `array` |  |  |

### tagRows

*private* - line 852

```php
function tagRows(?array $doc, array $want): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` | `?array` |  |  |
| `$want` | `array` |  |  |

### filePage

*private* - line 859

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

*private* - line 925

How an endpoint is protected: the checks it makes itself, else the ones made by a file it includes (a shared bootstrap like includes/files/api_bootstrap.php), at the top level of that file - a check inside a function only guards that function's callers.

```php
function guardText(string $rel, array $d): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rel` | `string` |  |  |
| `$d` | `array` |  |  |

### guardsOf

*private* - line 949

```php
function guardsOf(array $d, string $via): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `array` |  |  |
| `$via` | `string` |  |  |

### sqlMd

*private* - line 965

```php
function sqlMd(array $sql, array $tableSet): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$sql` | `array` |  |  |
| `$tableSet` | `array` |  |  |

### trapsMd

*private* - line 979

```php
function trapsMd(array $traps): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$traps` | `array` |  |  |

### seeLink

*private* - line 987

```php
function seeLink(string $v): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` | `string` |  |  |

### functionPage

*private* - line 994

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

*private* - line 1042

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

*private* - line 1068

```php
function tablePage(string $t, array $def, array $use): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |
| `$def` | `array` |  |  |
| `$use` | `array` |  |  |

### indexPage

*private* - line 1096

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

*private* - line 1113

```php
function functionsIndex(array $fnIndex): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fnIndex` | `array` |  |  |

### classesIndex

*private* - line 1128

```php
function classesIndex(array $classIndex): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$classIndex` | `array` |  |  |

### tablesIndex

*private* - line 1139

```php
function tablesIndex(array $schema, array $use): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$schema` | `array` |  |  |
| `$use` | `array` |  |  |

### filesIndex

*private* - line 1151

```php
function filesIndex(array $files): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |

### endpointsPage

*private* - line 1164

```php
function endpointsPage(array $files, array $jsCallers): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |
| `$jsCallers` | `array` |  |  |

### trapsPage

*private* - line 1181

```php
function trapsPage(array $files): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$files` | `array` |  |  |

### loadSchema

*private* - line 1196

```php
function loadSchema(): array
```

**Returns:** array<string, array{note:string, columns:array<string,array{def:string,note:string}>}>

### loadManifest

*private* - line 1242

```php
function loadManifest(): void
```

### saveManifest

*private* - line 1247

```php
function saveManifest(): void
```

### saveState

*private* - line 1248

```php
function saveState(): void
```

### readJson

*private* - line 1249

```php
function readJson(string $name, $default)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$default` |  |  |  |

### writeJson

*private* - line 1256

```php
function writeJson(string $name, $data): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$data` |  |  |  |

### lastScan

*public static* - line 1264

When the last scan finished, and what it did - for the reader's Rescan button.

```php
function lastScan(): ?array
```

