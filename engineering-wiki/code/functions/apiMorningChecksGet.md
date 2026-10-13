# apiMorningChecksGet()

GET /morning-checks/checks/{id} - one morning check.

```php
function apiMorningChecksGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 143.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadMorningCheck()](/code/functions/apiLoadMorningCheck.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeMorningCheck()](/code/functions/apiSerializeMorningCheck.md)

*Nothing calls this function by name.*

