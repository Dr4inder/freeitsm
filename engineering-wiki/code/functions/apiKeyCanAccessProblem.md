# apiKeyCanAccessProblem()

May this key access this problem (by its owning company)? Unknown id => false.

```php
function apiKeyCanAccessProblem(PDO $conn, array $apiKey, int $problemId): bool
```

Defined in [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md), line 251.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$problemId` | `int` |  |  |

**Returns:** `bool`

## Calls

[apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md) - in [apiLoadProblem()](/code/functions/apiLoadProblem.md)

