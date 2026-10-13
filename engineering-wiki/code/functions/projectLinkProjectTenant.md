# projectLinkProjectTenant()

The project's company (Default for NULL), or not-found for a project out of reach.

```php
function projectLinkProjectTenant(PDO $conn, ActorContext $ctx, int $projectId): int
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 97.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |

**Returns:** `int`

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

## Called from

- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectLinks()](/code/functions/projectLinks.md), [projectLinkAdd()](/code/functions/projectLinkAdd.md), [projectLinkRemove()](/code/functions/projectLinkRemove.md), [projectLinkSearch()](/code/functions/projectLinkSearch.md)

