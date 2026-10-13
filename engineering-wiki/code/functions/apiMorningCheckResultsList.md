# apiMorningCheckResultsList()

GET /morning-checks/results — history; newest first

```php
function apiMorningCheckResultsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 228.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiMorningCheckDate()](/code/functions/apiMorningCheckDate.md), [apiMorningResultSelect()](/code/functions/apiMorningResultSelect.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

