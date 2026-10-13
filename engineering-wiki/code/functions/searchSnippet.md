# searchSnippet()

A readable fragment of the body around the first matching term.

MySQL has no highlighting function, so this is done here. Returns PLAIN TEXT —
the caller escapes it. Never build HTML in this file; a snippet is user
content and the one place it must not be trusted is on its way to a page.

```php
function searchSnippet(string $body, array $parsed, int $len = 220): string
```

Defined in [includes/search/search.php](/code/files/includes/search/search.php.md), line 354.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$body` | `string` |  |  |
| `$parsed` | `array` |  |  |
| `$len` | `int` | `220` |  |

**Returns:** `string`

## Called from

- [includes/search/search.php](/code/files/includes/search/search.php.md) - in [searchCorpusQuery()](/code/functions/searchCorpusQuery.md)

