# projectLinkTenantOf()

A record's company with NULL read as the Default company.

```php
function projectLinkTenantOf(PDO $conn, string $table, int $id): ?int
```

Defined in [includes/projects/links.php](/code/files/includes/projects/links.php.md), line 91.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$table` | `string` |  |  |
| `$id` | `int` |  |  |

**Returns:** `?int`

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

## Called from

- [includes/projects/links.php](/code/files/includes/projects/links.php.md) - in [projectLinkTargetOk()](/code/functions/projectLinkTargetOk.md), [projectsPickableFor()](/code/functions/projectsPickableFor.md)

