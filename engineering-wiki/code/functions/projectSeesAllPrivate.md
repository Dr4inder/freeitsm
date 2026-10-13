# projectSeesAllPrivate()

May this analyst see every members-only project? (Manage Projects; admins.)

```php
function projectSeesAllPrivate(PDO $conn, int $analystId): bool
```

Defined in [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), line 56.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `bool`

## Calls

[projectIsManager()](/code/functions/projectIsManager.md)

## Called from

- [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md) - in [projectVisibleSql()](/code/functions/projectVisibleSql.md), [projectVisibleTo()](/code/functions/projectVisibleTo.md)

