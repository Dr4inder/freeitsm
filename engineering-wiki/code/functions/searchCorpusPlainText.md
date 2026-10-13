# searchCorpusPlainText()

Reduce HTML to the plain text worth indexing.

Order matters: <script> and <style> bodies have to go BEFORE tags are
stripped, or their contents survive as text and every ticket ends up
"containing" a stylesheet.

```php
function searchCorpusPlainText(?string $html, int $maxChars = 1000000): string
```

Defined in [includes/search/corpus.php](/code/files/includes/search/corpus.php.md), line 72.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$html` | `?string` |  |  |
| `$maxChars` | `int` | `1000000` |  |

**Returns:** `string`

## Called from

- [includes/search/indexer.php](/code/files/includes/search/indexer.php.md) - in [searchIndexTicket()](/code/functions/searchIndexTicket.md), [searchIndexArticle()](/code/functions/searchIndexArticle.md)

