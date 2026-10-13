# apiProjectRaidRow()

One RAID entry of a project, or answers 404 and stops.

```php
function apiProjectRaidRow(PDO $conn, int $pid, int $rid): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 464.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$pid` | `int` |  |  |
| `$rid` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectRaidCreate()](/code/functions/apiProjectRaidCreate.md), [apiProjectRaidUpdate()](/code/functions/apiProjectRaidUpdate.md), [apiProjectRaidDelete()](/code/functions/apiProjectRaidDelete.md)

