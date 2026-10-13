# statusPlannedUtc()

'Y-m-d H:i:s' UTC from anything `strtotime()` reads as UTC (the page sends ISO from `inputToUTC()`).

```php
function statusPlannedUtc($v): ?string
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 62.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

**Returns:** `?string`

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedSave()](/code/functions/statusPlannedSave.md)

