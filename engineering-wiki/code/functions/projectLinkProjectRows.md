# projectLinkProjectRows()

Projects by id, shaped for a list on another module's page.

```php
function projectLinkProjectRows(PDO $conn, array $ids): array
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 362.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ids` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 367 | `projectLinkProjectRows` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[entityLink()](/code/functions/entityLink.md), [projectColourHex()](/code/functions/projectColourHex.md), [projectDecorate()](/code/functions/projectDecorate.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectTaskStats()](/code/functions/projectTaskStats.md)

## Called from

- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectsLinkedTo()](/code/functions/projectsLinkedTo.md), [projectsPickableFor()](/code/functions/projectsPickableFor.md)

