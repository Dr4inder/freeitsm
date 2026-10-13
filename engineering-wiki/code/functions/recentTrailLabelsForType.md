# recentTrailLabelsForType()

One query for the labels of one type, then the record gate on each.

```php
function recentTrailLabelsForType(PDO $conn, int $analystId, string $type, array $ids): array
```

Defined in [includes/recent_trail.php](/code/files/includes/recent_trail.php.md), line 421.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$type` | `string` |  |  |
| `$ids` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 430 | `recentTrailLabelsForType` | read [tickets](/code/tables/tickets.md) |  |
| 436 | `recentTrailLabelsForType` | read [tasks](/code/tables/tasks.md) |  |
| 441 | `recentTrailLabelsForType` | read [problems](/code/tables/problems.md) |  |
| 447 | `recentTrailLabelsForType` | read [changes](/code/tables/changes.md) |  |
| 454 | `recentTrailLabelsForType` | read [assets](/code/tables/assets.md) |  |
| 463 | `recentTrailLabelsForType` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 468 | `recentTrailLabelsForType` | read [domains](/code/tables/domains.md) |  |
| 474 | `recentTrailLabelsForType` | read [projects](/code/tables/projects.md) |  |
| 476 | `recentTrailLabelsForType` | read [projects](/code/tables/projects.md) |  |
| 487 | `recentTrailLabelsForType` | read [users](/code/tables/users.md) |  |
| 492 | `recentTrailLabelsForType` | read [tenants](/code/tables/tenants.md) |  |
| 499 | `recentTrailLabelsForType` | read [suppliers](/code/tables/suppliers.md) |  |
| 504 | `recentTrailLabelsForType` | read [contacts](/code/tables/contacts.md) |  |
| 512 | `recentTrailLabelsForType` | read [contracts](/code/tables/contracts.md) |  |
| 525 | `recentTrailLabelsForType` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[analystCanAccessAsset()](/code/functions/analystCanAccessAsset.md), [analystCanAccessChange()](/code/functions/analystCanAccessChange.md), [analystCanAccessCmdbObject()](/code/functions/analystCanAccessCmdbObject.md), [analystCanAccessDomain()](/code/functions/analystCanAccessDomain.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [analystCanAccessProblem()](/code/functions/analystCanAccessProblem.md), [analystCanAccessTask()](/code/functions/analystCanAccessTask.md), [analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [analystCanAccessUser()](/code/functions/analystCanAccessUser.md), [contractCanView()](/code/functions/contractCanView.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [projectIdVisibleTo()](/code/functions/projectIdVisibleTo.md)

## Called from

- [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) - in [recentTrailLabels()](/code/functions/recentTrailLabels.md)

