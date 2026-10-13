# apiChangeLookupList()

Reference lookups

```php
function apiChangeLookupList(PDO $conn, string $table, bool $hasIsClosed = false): void
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 489.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$hasIsClosed` | `bool` | `false` |  |

**Returns:** `void`

## Calls

[apiRespond()](/code/functions/apiRespond.md)

## Called from

- [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md) - in [apiChangeStatusesList()](/code/functions/apiChangeStatusesList.md), [apiChangeTypesList()](/code/functions/apiChangeTypesList.md), [apiChangePrioritiesList()](/code/functions/apiChangePrioritiesList.md), [apiChangeImpactsList()](/code/functions/apiChangeImpactsList.md)

