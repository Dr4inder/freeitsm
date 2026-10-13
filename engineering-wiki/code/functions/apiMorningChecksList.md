# apiMorningChecksList()

GET /morning-checks/checks — all checks (settings view); ?is_active, ?q

```php
function apiMorningChecksList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 123.

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

