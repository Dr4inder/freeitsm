# apiMorningChecksBoard()

GET /morning-checks/board?date=YYYY-MM-DD — get_todays_checks.php's view: every active check with its result for the date (or null if not yet done).

```php
function apiMorningChecksBoard(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 177.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiMorningCheckDate()](/code/functions/apiMorningCheckDate.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

