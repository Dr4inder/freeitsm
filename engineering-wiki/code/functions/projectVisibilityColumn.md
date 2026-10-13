# projectVisibilityColumn()

p.visibility, or 'everyone' before Verification - for a SELECT list.

```php
function projectVisibilityColumn(PDO $conn, string $alias = 'p'): string
```

Defined in [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), line 51.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$alias` | `string` | `'p'` |  |

**Returns:** `string`

## Calls

[projectVisibilityReady()](/code/functions/projectVisibilityReady.md)

## Called from

- [includes/projects/read.php](/code/files/includes/projects/read.php.md) - in [projectListRows()](/code/functions/projectListRows.md)

