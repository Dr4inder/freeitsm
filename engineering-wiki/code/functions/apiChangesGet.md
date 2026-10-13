# apiChangesGet()

GET /changes/{id} — detail incl. bodies, PIR, attachments, linked problems

```php
function apiChangesGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md), line 264.

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
| 283 | `apiChangesGet` | read [change_attachments](/code/tables/change_attachments.md) |  |
| 301 | `apiChangesGet` | read [change_relations](/code/tables/change_relations.md), read [problems](/code/tables/problems.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadChange()](/code/functions/apiLoadChange.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeChange()](/code/functions/apiSerializeChange.md)

*Nothing calls this function by name.*

