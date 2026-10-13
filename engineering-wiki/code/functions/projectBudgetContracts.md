# projectBudgetContracts()

The contracts linked to the project on Connections - what a line may name.

```php
function projectBudgetContracts(PDO $conn, int $projectId): array
```

Defined in [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), line 482.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 485 | `projectBudgetContracts` | read [project_contracts](/code/tables/project_contracts.md), read [contracts](/code/tables/contracts.md) |  |

## Called from

- [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) - in [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::saveBudgetLine`

