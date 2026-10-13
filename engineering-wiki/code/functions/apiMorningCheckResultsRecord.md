# apiMorningCheckResultsRecord()

```php
function apiMorningCheckResultsRecord(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 276.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadMorningResult()](/code/functions/apiLoadMorningResult.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeMorningResult()](/code/functions/apiSerializeMorningResult.md)

*Nothing calls this function by name.*

