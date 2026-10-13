# apiProblemStatusesList()

Reference lookups

```php
function apiProblemStatusesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 411.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 413 | `apiProblemStatusesList` | read [problem_statuses](/code/tables/problem_statuses.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

