# projectCanDecideChange()

May this analyst approve or reject a change request? The setting says who (team = anyone who may change the project; owner = its project manager or Manage Projects; managers = Manage Projects only), and project_change_self whether the person who raised it may decide it too.

```php
function projectCanDecideChange(
    PDO $conn,
    int $analystId,
    array $project,
    ?int $raisedBy = null
): bool
```

Defined in [includes/projects/control.php](/code/files/includes/projects/control.php.md), line 209.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$project` | `array` |  |  |
| `$raisedBy` | `?int` | `null` |  |

**Returns:** `bool`

## Calls

[projectCanChange()](/code/functions/projectCanChange.md), [projectIsManager()](/code/functions/projectIsManager.md), [projectSetting()](/code/functions/projectSetting.md)

## Called from

- [includes/projects/control.php](/code/files/includes/projects/control.php.md) - in [projectControlDetail()](/code/functions/projectControlDetail.md)
- [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) - in [projectNudgeDeciders()](/code/functions/projectNudgeDeciders.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::decideChangeRequest`

