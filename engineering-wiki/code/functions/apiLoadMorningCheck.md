# apiLoadMorningCheck()

Loads one morning check row, or answers 404 and stops.

```php
function apiLoadMorningCheck(PDO $conn, int $checkId): array
```

Defined in [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md), line 51.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$checkId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/morning_checks.php](/code/files/api/v1/resources/morning_checks.php.md) - in [apiMorningChecksGet()](/code/functions/apiMorningChecksGet.md), [apiMorningChecksCreate()](/code/functions/apiMorningChecksCreate.md), [apiMorningChecksUpdate()](/code/functions/apiMorningChecksUpdate.md)

