# apiProblemsGet()

```php
function apiProblemsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 199.

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
| 204 | `apiProblemsGet` | read [problem_tickets](/code/tables/problem_tickets.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 227 | `apiProblemsGet` | read [change_relations](/code/tables/change_relations.md), read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadProblem()](/code/functions/apiLoadProblem.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProblem()](/code/functions/apiSerializeProblem.md)

*Nothing calls this function by name.*

