# projectProposalBlocksStatus()

A pending proposal may only stay proposed or be withdrawn (cancelled).

```php
function projectProposalBlocksStatus(array $project, string $newStatus): bool
```

Defined in [includes/projects/intake.php](/code/files/includes/projects/intake.php.md), line 86.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$project` | `array` |  |  |
| `$newStatus` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/services/projects.php](/code/files/includes/services/projects.php.md) - in `ProjectsService::updateProject`

