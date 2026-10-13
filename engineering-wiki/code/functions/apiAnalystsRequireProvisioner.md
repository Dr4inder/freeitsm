# apiAnalystsRequireProvisioner()

403 unless this key may provision analysts.

```php
function apiAnalystsRequireProvisioner(PDO $conn, array $apiKey): void
```

Defined in [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md), line 25.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |

**Returns:** `void`

## Calls

[analystIsAdmin()](/code/functions/analystIsAdmin.md), [apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md) - in [apiAnalystsCreate()](/code/functions/apiAnalystsCreate.md), [apiAnalystsUpdate()](/code/functions/apiAnalystsUpdate.md), [apiAnalystsAccessUpdate()](/code/functions/apiAnalystsAccessUpdate.md)

