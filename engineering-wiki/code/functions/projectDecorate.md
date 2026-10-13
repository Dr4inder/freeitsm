# projectDecorate()

Add progress, counts and the health actually shown to a project row.

```php
function projectDecorate(array $p, array $stats, ?array $cfg = null): array
```

Defined in [includes/projects/read.php](/code/files/includes/projects/read.php.md), line 240.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$p` | `array` |  |  |
| `$stats` | `array` |  |  |
| `$cfg` | `?array` | `null` |  |

**Returns:** `array`

## Calls

[projectAutoHealth()](/code/functions/projectAutoHealth.md), [projectCode()](/code/functions/projectCode.md), [projectEnabledTools()](/code/functions/projectEnabledTools.md), [projectExceptions()](/code/functions/projectExceptions.md), [projectFinishedStatuses()](/code/functions/projectFinishedStatuses.md), [projectTicketSpike()](/code/functions/projectTicketSpike.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectDecorate()](/code/functions/apiProjectDecorate.md)
- [includes/people.php](/code/files/includes/people.php.md) - in [peopleProjects()](/code/functions/peopleProjects.md)
- [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) - in [projectAlertRows()](/code/functions/projectAlertRows.md)
- [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) - in [projectAssistRows()](/code/functions/projectAssistRows.md)
- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectLinkProjectRows()](/code/functions/projectLinkProjectRows.md)
- [includes/projects/read.php](/code/files/includes/projects/read.php.md) - in [projectListRows()](/code/functions/projectListRows.md), [projectDetail()](/code/functions/projectDetail.md)
- [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) - in [rpProjectRows()](/code/functions/rpProjectRows.md)
- [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) - in [getWatchtowerData()](/code/functions/getWatchtowerData.md)

