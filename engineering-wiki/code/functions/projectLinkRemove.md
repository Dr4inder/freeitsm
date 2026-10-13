# projectLinkRemove()

Removes a link between a project and a record and records it in the project's history.

Needs the same rights as adding it. Returns false when there was no such link.

```php
function projectLinkRemove(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $kind,
    int $targetId
): bool
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 279.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$targetId` | `int` |  |  |

**Returns:** `bool`

## Calls

[projectLinkDescribe()](/code/functions/projectLinkDescribe.md), [projectLinkKind()](/code/functions/projectLinkKind.md), [projectLinkKindAllowed()](/code/functions/projectLinkKindAllowed.md), [projectLinkProjectTenant()](/code/functions/projectLinkProjectTenant.md), [projectLinksReady()](/code/functions/projectLinksReady.md), [projectLinkTargetOk()](/code/functions/projectLinkTargetOk.md)

## Called from

- [api/projects/links.php](/code/files/api/projects/links.php.md)

