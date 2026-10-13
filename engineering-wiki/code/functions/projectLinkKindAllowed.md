# projectLinkKindAllowed()

May this analyst use links of this kind at all? (Projects AND the other module.)

```php
function projectLinkKindAllowed(PDO $conn, int $analystId, string $kind): bool
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 82.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$kind` | `string` |  |  |

**Returns:** `bool`

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [projectLinkKinds()](/code/functions/projectLinkKinds.md)

## Called from

- [includes/projects/ai.php](/code/files/includes/projects/ai.php.md) - in [projectAiFacts()](/code/functions/projectAiFacts.md)
- [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) - in [projectAssistOverview()](/code/functions/projectAssistOverview.md)
- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectLinks()](/code/functions/projectLinks.md), [projectLinkAdd()](/code/functions/projectLinkAdd.md), [projectLinkRemove()](/code/functions/projectLinkRemove.md), [projectLinkSearch()](/code/functions/projectLinkSearch.md), [projectsLinkedTo()](/code/functions/projectsLinkedTo.md), [projectsPickableFor()](/code/functions/projectsPickableFor.md)

