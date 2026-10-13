# projectGateOpenItems()

The items still open at one stage's gate: [{id, kind, title}].

```php
function projectGateOpenItems(PDO $conn, int $projectId, int $stageId): array
```

Defined in [includes/projects/gatecheck.php](/code/files/includes/projects/gatecheck.php.md), line 101.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |

**Returns:** `array`

## Calls

[projectGateItems()](/code/functions/projectGateItems.md)

## Called from

- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::decideGate`

