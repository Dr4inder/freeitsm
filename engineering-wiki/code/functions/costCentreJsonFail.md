# costCentreJsonFail()

Sends an HTTP status (200 by default) and {success: false, error} as JSON, then stops.

```php
function costCentreJsonFail(string $message, int $status = 200): void
```

Defined in [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), line 40.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$message` | `string` |  |  |
| `$status` | `int` | `200` |  |

**Returns:** `void`

## Called from

- [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md)

