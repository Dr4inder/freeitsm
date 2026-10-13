# EwMarkdown

> Class in [includes/engineering_wiki/markdown.php](/code/files/includes/engineering_wiki/markdown.php.md), line 24

Engineering wiki - a small Markdown renderer written for the wiki, so the pages look and read like GitHub without pulling in a library.

What it understands (the GitHub-flavoured subset the wiki uses):
  # headings (with GitHub-style anchors), paragraphs, **bold**, *italic*,
  ~~strike~~, `code`, [links](other-page.md#anchor), [[wiki links]],
  <https://autolinks>, ![images](https://...), > quotes and GitHub alerts
  (> [!NOTE] / TIP / IMPORTANT / WARNING / CAUTION), - and 1. lists (nested,
  - [ ] task lists), | tables | with :alignment:, ``` fenced code ``` with a
  little highlighting for php / sql / js / json / bash, and --- rules.

TRAP: raw HTML in a page is NEVER passed through - every character of text is
escaped. The pages are files a developer edits, and a generated page quotes
code comments, so treating any of it as HTML would let a comment run script in
an administrator's browser. Anything that needs markup gets a Markdown form.

Links: the caller passes a resolver. An internal link (a relative .md path or a
[[wiki link]]) becomes <a href="?page=..." data-ew-page="..."> so the viewer can
open it in a tab; anything with a scheme opens in a new browser window.

## Methods

| Method | What it does |
|---|---|
| [render()](#render) | Render a page. |
| [blocks()](#blocks) |  |
| [startsBlock()](#startsblock) | Would this line start a new block (and so end a paragraph)? |
| [heading()](#heading) |  |
| [slug()](#slug) | GitHub's anchor rule: lower case, punctuation dropped, spaces to hyphens, repeats numbered. |
| [quote()](#quote) |  |
| [isTableRule()](#istablerule) |  |
| [cells()](#cells) |  |
| [table()](#table) |  |
| [listMarker()](#listmarker) |  |
| [listBlock()](#listblock) | One list (and its nested lists). `@return` array{0:string,1:int} [html, next line] |
| [codeBlock()](#codeblock) |  |
| [highlight()](#highlight) | Just enough colour to read by: comments, strings, numbers, keywords, variables. |
| [inlineLines()](#inlinelines) |  |
| [hold()](#hold) |  |
| [inline()](#inline) |  |
| [link()](#link) |  |
| [e()](#e) |  |

### render

*public static* - line 40

Render a page.

```php
function render(string $md, callable $resolve): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$md` | `string` |  | the Markdown source |
| `$resolve` | `callable` |  | fn(string `$href`): ?string - maps a relative link to a wiki page path |

**Returns:** array{html:string, title:?string, toc:array<int,array{level:int,text:string,id:string}>}

**Called from:** [includes/engineering_wiki/store.php](/code/files/includes/engineering_wiki/store.php.md)

### blocks

*private* - line 51

```php
function blocks(array $lines): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$lines` | `array` |  |  |

### startsBlock

*private* - line 125

Would this line start a new block (and so end a paragraph)?

```php
function startsBlock(string $line): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$line` | `string` |  |  |

### heading

*private* - line 131

```php
function heading(int $level, string $text): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$level` | `int` |  |  |
| `$text` | `string` |  |  |

### slug

*private* - line 142

GitHub's anchor rule: lower case, punctuation dropped, spaces to hyphens, repeats numbered.

```php
function slug(string $text): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$text` | `string` |  |  |

### quote

*private* - line 154

```php
function quote(array $lines): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$lines` | `array` |  |  |

### isTableRule

*private* - line 167

```php
function isTableRule(string $line): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$line` | `string` |  |  |

### cells

*private* - line 173

```php
function cells(string $row): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `string` |  |  |

### table

*private* - line 191

```php
function table(array $rows): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rows` | `array` |  |  |

### listMarker

*private* - line 213

```php
function listMarker(string $line): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$line` | `string` |  |  |

**Returns:** ?array{indent:int, ordered:bool, start:int, width:int}

### listBlock

*private* - line 222

One list (and its nested lists). `@return` array{0:string,1:int} [html, next line]

```php
function listBlock(array $lines, int $i): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$lines` | `array` |  |  |
| `$i` | `int` |  |  |

### codeBlock

*private* - line 282

```php
function codeBlock(string $code, string $lang): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$code` | `string` |  |  |
| `$lang` | `string` |  |  |

### highlight

*private* - line 293

Just enough colour to read by: comments, strings, numbers, keywords, variables.

```php
function highlight(string $code, string $kind): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$code` | `string` |  |  |
| `$kind` | `string` |  |  |

### inlineLines

*private* - line 330

```php
function inlineLines(array $lines): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$lines` | `array` |  |  |

### hold

*private* - line 343

```php
function hold(string $html): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$html` | `string` |  |  |

### inline

*private* - line 349

```php
function inline(string $t): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `string` |  |  |

### link

*private* - line 379

```php
function link(string $href, string $label, bool $wiki = false): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$href` | `string` |  |  |
| `$label` | `string` |  |  |
| `$wiki` | `bool` | `false` |  |

### e

*private* - line 401

```php
function e(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

