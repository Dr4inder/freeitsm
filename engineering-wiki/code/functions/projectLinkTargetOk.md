# projectLinkTargetOk()

Is the OTHER end of a link one this analyst may see, and (for company records) in the project's company?

```php
function projectLinkTargetOk(
    PDO $conn,
    int $analystId,
    string $kind,
    int $targetId,
    ?int $projectTenant
): bool
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 108.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$targetId` | `int` |  |  |
| `$projectTenant` | `?int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 123 | `projectLinkTargetOk` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[analystCanAccessAsset()](/code/functions/analystCanAccessAsset.md), [analystCanAccessChange()](/code/functions/analystCanAccessChange.md), [analystCanAccessCmdbObject()](/code/functions/analystCanAccessCmdbObject.md), [analystCanAccessProblem()](/code/functions/analystCanAccessProblem.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [contractCanView()](/code/functions/contractCanView.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [knowledgeCanRead()](/code/functions/knowledgeCanRead.md), [projectLinkKinds()](/code/functions/projectLinkKinds.md), [projectLinkTenantOf()](/code/functions/projectLinkTenantOf.md)

## Called from

- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectLinks()](/code/functions/projectLinks.md), [projectLinkAdd()](/code/functions/projectLinkAdd.md), [projectLinkRemove()](/code/functions/projectLinkRemove.md), [projectLinkSearch()](/code/functions/projectLinkSearch.md), [projectsLinkedTo()](/code/functions/projectsLinkedTo.md), [projectsPickableFor()](/code/functions/projectsPickableFor.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::saveRaid`

