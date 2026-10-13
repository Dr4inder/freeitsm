# apiLoadChange()

Loads one change row (apiChangeSelect), or answers 404 and stops - including for a change in a company the key cannot reach.

```php
function apiLoadChange(PDO $conn, array $apiKey, int $changeId): array
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 128.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$changeId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiChangeSelect()](/code/functions/apiChangeSelect.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md) - in [apiChangesGet()](/code/functions/apiChangesGet.md), [apiChangesCreate()](/code/functions/apiChangesCreate.md), [apiChangesUpdate()](/code/functions/apiChangesUpdate.md), [apiChangeCommentsList()](/code/functions/apiChangeCommentsList.md), [apiChangeAuditList()](/code/functions/apiChangeAuditList.md), [apiChangeCabGet()](/code/functions/apiChangeCabGet.md)

