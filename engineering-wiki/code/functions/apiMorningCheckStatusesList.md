# apiMorningCheckStatusesList()

GET /morning-check-statuses — full list like get_statuses.php (inactive included so historical results can always be resolved).

```php
function apiMorningCheckStatusesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 289.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

