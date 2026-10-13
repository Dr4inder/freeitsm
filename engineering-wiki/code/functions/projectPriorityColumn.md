# projectPriorityColumn()

p.priority, or 'medium' before Database Verification has added the column (3.3.0).

```php
function projectPriorityColumn(PDO $conn): string
```

Defined in [includes/projects/read.php](/code/files/includes/projects/read.php.md), line 323.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 327 | `projectPriorityColumn` | read [projects](/code/tables/projects.md) |  |

## Called from

- [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) - in [projectAlertRows()](/code/functions/projectAlertRows.md)
- [includes/projects/read.php](/code/files/includes/projects/read.php.md) - in [projectListRows()](/code/functions/projectListRows.md)

