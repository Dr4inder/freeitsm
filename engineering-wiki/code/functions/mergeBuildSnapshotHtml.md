# mergeBuildSnapshotHtml()

Render a source ticket's whole conversation as a self-contained HTML document.

⚠️ THIS FILE IS OPENED OUTSIDE THE APP. An analyst downloads it and it renders in a
browser tab with no Content-Security-Policy and none of the app's protections, and
the message bodies in it were written by whoever emailed the service desk.

So every body goes through `sanitiseUserHtml()` — the same customer allow-list the
portal uses on the way in — which keeps a short list of formatting tags and drops
<script>, <style>, <iframe>, every on* handler and <img>. Plain-text bodies are
escaped and <br>-ed instead. Nothing else here is interpolated without
`htmlspecialchars()`.

Stripping <script> alone would NOT be enough: `onerror` on a surviving tag fires
with no script element anywhere. That is why this uses the one shared allow-list
rather than a hand-rolled strip.

```php
function mergeBuildSnapshotHtml(PDO $conn, int $sourceId, array $source): string
```

Defined in [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), line 648.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$sourceId` | `int` |  |  |
| `$source` | `array` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 655 | `mergeBuildSnapshotHtml` | read [emails](/code/tables/emails.md) |  |
| 665 | `mergeBuildSnapshotHtml` | read [ticket_notes](/code/tables/ticket_notes.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[sanitiseUserHtml()](/code/functions/sanitiseUserHtml.md)

## Called from

- [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md) - in [mergeOneTicket()](/code/functions/mergeOneTicket.md)

