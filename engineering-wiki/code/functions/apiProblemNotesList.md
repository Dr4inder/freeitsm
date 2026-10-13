# apiProblemNotesList()

```php
function apiProblemNotesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 302.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 305 | `apiProblemNotesList` | read [problem_notes](/code/tables/problem_notes.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadProblem()](/code/functions/apiLoadProblem.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

