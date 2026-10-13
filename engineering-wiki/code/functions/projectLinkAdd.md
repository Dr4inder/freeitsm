# projectLinkAdd()

Links a record (asset, ticket, contract...) to a project and records it in the project's history.

Both ends must be visible to the actor and the actor must be able to change the
project. Returns false when the link already existed.

```php
function projectLinkAdd(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $kind,
    int $targetId
): bool
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 254.

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
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::linkQuietly`

