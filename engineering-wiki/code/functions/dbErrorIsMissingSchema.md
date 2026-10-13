# dbErrorIsMissingSchema()

Either of the above — the two shapes a part-migrated install actually takes.

```php
function dbErrorIsMissingSchema(PDOException $e): bool
```

Defined in [includes/db_errors.php](/code/files/includes/db_errors.php.md), line 42.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$e` | `PDOException` |  |  |

**Returns:** `bool`

## Calls

[dbErrorIsMissingTable()](/code/functions/dbErrorIsMissingTable.md), [dbErrorIsUnknownColumn()](/code/functions/dbErrorIsUnknownColumn.md)

## Called from

- [includes/tenancy.php](/code/files/includes/tenancy.php.md) - in [tenancyDegradeAllowed()](/code/functions/tenancyDegradeAllowed.md)

