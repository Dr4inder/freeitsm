# integrationsKnownCommentIds()

Comment ids already mapped for one link, in either direction.

```php
function integrationsKnownCommentIds(PDO $conn, int $linkId): array
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1180.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$linkId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1184 | `integrationsKnownCommentIds` | read [integration_comment_map](/code/tables/integration_comment_map.md) |  |

## Calls

[integrationsCommentSchemaReady()](/code/functions/integrationsCommentSchemaReady.md)

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsApplyCommentEvent()](/code/functions/integrationsApplyCommentEvent.md)

