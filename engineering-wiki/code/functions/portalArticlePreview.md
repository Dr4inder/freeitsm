# portalArticlePreview()

Turn an article body into a short plain-text preview.

`strip_tags()` removes TAGS but keeps their CONTENTS, so a <script> or <style>
block spills its source into the preview as readable text ("…sign in.
alert(1)"). Those elements are dropped whole first. Not a security control —
the preview is escaped on render — just correctness.

`strip_tags()` also leaves NO separator where a tag was, so "<h3>Password
Reset</h3><p>You can…" comes out as "Password ResetYou can…". A space is
pushed in front of every tag first, then the run is collapsed — which keeps
`strip_tags()` (and its tolerance of malformed markup) rather than swapping in
a hand-rolled tag regex.

```php
function portalArticlePreview(?string $body, int $length = 400): string
```

Defined in [includes/knowledge/portal_reader.php](/code/files/includes/knowledge/portal_reader.php.md), line 107.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$body` | `?string` |  | the article body HTML; null gives '' |
| `$length` | `int` | `400` | the most characters kept before an ellipsis is added |

**Returns:** `string`

## Called from

- [api/self-service/get_knowledge_articles.php](/code/files/api/self-service/get_knowledge_articles.php.md)

