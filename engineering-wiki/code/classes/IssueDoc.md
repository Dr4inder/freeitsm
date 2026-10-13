# IssueDoc

> Class in [includes/integrations/IssueDoc.php](/code/files/includes/integrations/IssueDoc.php.md), line 38

IssueDoc — one description/comment, written once, rendered per provider.

The problem this solves: every issue tracker wants a different body format.
Jira Cloud's v3 API wants ADF (Atlassian Document Format — a nested JSON
document). Jira Data Center's v2 API wants wiki markup. GitHub and GitLab want
Markdown. Azure DevOps wants HTML. If core built a string, every one of those
would need its own string-building code and they would drift.

So core never builds a string. It builds an IssueDoc — an ordered list of
blocks — and the connector asks for the shape it needs:

    `$doc` = (new IssueDoc)
        ->heading('Raised in FreeITSM')
        ->para('Ticket ', IssueDoc::link(`$url`, 'SD-1042'), ' · Jane Doe (Acme)')
        ->rule()
        ->para(`$ticket`['description']);

    `$doc`->toAdf();        // Jira Cloud   (array, JSON-encode it)
    `$doc`->toWikiMarkup(); // Jira DC
    `$doc`->toMarkdown();   // GitHub / GitLab
    `$doc`->toHtml();       // Azure DevOps

The renderers live HERE rather than in each connector on purpose: a new
provider almost always reuses one of these four, so adding GitHub is
"renderDoc() returns `$doc`->toMarkdown()" and not a new renderer. That is what
makes the connector-per-provider cost small.

Deliberately small — heading, paragraph, link, bullet list, code block, rule.
This is not a rich-text format. It is enough to make a readable issue and no
more; anything bigger becomes a second sanitiser to keep safe.

⚠️ Text is always treated as PLAIN TEXT and escaped for the target format.
Never pass HTML in and expect it to survive — pass the text, use the blocks.

## Methods

| Method | What it does |
|---|---|
| [link()](#link) | A link, for use inside `para()`. Returns the inline marker `para()` understands. |
| [heading()](#heading) |  |
| [para()](#para) | A paragraph of inline parts. Each part is either a plain string or the array returned by self::link(). Empty parts are dropped; a paragraph that ends up with nothing in it is not added at all (an empty paragraph is invalid in ADF, and pointless everywhere else). |
| [bullets()](#bullets) |  |
| [code()](#code) |  |
| [rule()](#rule) |  |
| [isEmpty()](#isempty) |  |
| [blocks()](#blocks) | The raw block list. For tests and for a connector that needs its own renderer. |
| [toAdf()](#toadf) | Atlassian Document Format (Jira Cloud v3). Returns the PHP array — the caller JSON-encodes it, because it is usually one field inside a bigger request body. |
| [adfInlines()](#adfinlines) |  |
| [toMarkdown()](#tomarkdown) | GitHub, GitLab. |
| [toWikiMarkup()](#towikimarkup) | Jira Data Center / Server (v2 API). |
| [toHtml()](#tohtml) | Azure DevOps (System.Description is HTML). |
| [toPlainText()](#toplaintext) | Plain text — for the escalate preview, and for logs. |
| [h()](#h) |  |
| [mdEscape()](#mdescape) | Markdown: neutralise the characters that would otherwise turn a ticket's text into formatting. A requester writing "use the * wildcard" must not produce italics, and "[see notes]" must not look like a broken link. |
| [wikiEscape()](#wikiescape) | Jira wiki markup: the same idea, different character set. |

### link

*public static* - line 52

A link, for use inside `para()`. Returns the inline marker `para()` understands.

```php
function link(string $href, string $text): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$href` | `string` |  |  |
| `$text` | `string` |  |  |

**Called from:** [api/integrations/escalate_ticket.php](/code/files/api/integrations/escalate_ticket.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

### heading

*public* - line 57

```php
function heading(string $text): self
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$text` | `string` |  |  |

### para

*public* - line 71

A paragraph of inline parts. Each part is either a plain string or the array returned by self::link(). Empty parts are dropped; a paragraph that ends up with nothing in it is not added at all (an empty paragraph is invalid in ADF, and pointless everywhere else).

```php
function para(...$parts): self
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `...$parts` |  |  |  |

### bullets

*public* - line 93

```php
function bullets(array $items): self
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$items` | `array` |  |  |

### code

*public* - line 106

```php
function code(string $text): self
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$text` | `string` |  |  |

### rule

*public* - line 114

```php
function rule(): self
```

### isEmpty

*public* - line 124

```php
function isEmpty(): bool
```

### blocks

*public* - line 130

The raw block list. For tests and for a connector that needs its own renderer.

```php
function blocks(): array
```

### toAdf

*public* - line 145

Atlassian Document Format (Jira Cloud v3). Returns the PHP array — the caller JSON-encodes it, because it is usually one field inside a bigger request body.

⚠️ ADF rejects empty text nodes and empty paragraphs, which is why the
builders above refuse to create them.

```php
function toAdf(): array
```

### adfInlines

*private* - line 186

```php
function adfInlines(array $inlines): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$inlines` | `array` |  |  |

### toMarkdown

*public* - line 204

GitHub, GitLab.

```php
function toMarkdown(): string
```

### toWikiMarkup

*public* - line 239

Jira Data Center / Server (v2 API).

```php
function toWikiMarkup(): string
```

### toHtml

*public* - line 274

Azure DevOps (System.Description is HTML).

```php
function toHtml(): string
```

### toPlainText

*public* - line 309

Plain text — for the escalate preview, and for logs.

```php
function toPlainText(): string
```

### h

*private* - line 343

```php
function h(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### mdEscape

*private* - line 353

Markdown: neutralise the characters that would otherwise turn a ticket's text into formatting. A requester writing "use the * wildcard" must not produce italics, and "[see notes]" must not look like a broken link.

```php
function mdEscape(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

### wikiEscape

*private* - line 359

Jira wiki markup: the same idea, different character set.

```php
function wikiEscape(string $s): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |

