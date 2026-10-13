# projectLinkSearch()

Records of one kind that could be linked: matching `$q`, in the project's company where that applies, visible to the analyst, not already linked. At most 20.

```php
function projectLinkSearch(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $kind,
    string $q
): array
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 285.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$q` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 298 | `projectLinkSearch` | read [assets](/code/tables/assets.md) |  |
| 302 | `projectLinkSearch` | read [changes](/code/tables/changes.md) |  |
| 306 | `projectLinkSearch` | read [tickets](/code/tables/tickets.md) |  |
| 310 | `projectLinkSearch` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 314 | `projectLinkSearch` | read [problems](/code/tables/problems.md) |  |
| 318 | `projectLinkSearch` | read [contracts](/code/tables/contracts.md) |  |
| 324 | `projectLinkSearch` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [projectLinkDescribe()](/code/functions/projectLinkDescribe.md), [projectLinkKind()](/code/functions/projectLinkKind.md), [projectLinkKindAllowed()](/code/functions/projectLinkKindAllowed.md), [projectLinkProjectTenant()](/code/functions/projectLinkProjectTenant.md), [projectLinksReady()](/code/functions/projectLinksReady.md), [projectLinkTargetOk()](/code/functions/projectLinkTargetOk.md)

## Called from

- [api/projects/links.php](/code/files/api/projects/links.php.md)

