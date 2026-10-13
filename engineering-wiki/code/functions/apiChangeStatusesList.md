# apiChangeStatusesList()

GET /change-statuses - the change statuses, with is_closed.

```php
function apiChangeStatusesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 508.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiChangeLookupList()](/code/functions/apiChangeLookupList.md)

*Nothing calls this function by name.*

