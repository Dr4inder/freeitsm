# apiSerializeProblem()

Shapes a problem row for the API - number, title, status (with is_closed), priority, analyst, known-error flag, root cause, workaround, company and the rest of the record.

```php
function apiSerializeProblem(array $r): array
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 60.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

**Returns:** `array`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md) - in [apiProblemsGet()](/code/functions/apiProblemsGet.md), [apiProblemsCreate()](/code/functions/apiProblemsCreate.md), [apiProblemsUpdate()](/code/functions/apiProblemsUpdate.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::fullObjectLoaders`

