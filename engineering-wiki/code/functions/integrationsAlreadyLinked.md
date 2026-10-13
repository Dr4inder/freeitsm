# integrationsAlreadyLinked()

Is this work item already linked to this connection? (drives skip_if_linked)

```php
function integrationsAlreadyLinked(
    PDO $conn,
    int $connectionId,
    string $entityType,
    int $entityId
): bool
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 458.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$connectionId` | `int` |  |  |
| `$entityType` | `string` |  |  |
| `$entityId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 463 | `integrationsAlreadyLinked` | read [integration_links](/code/tables/integration_links.md) |  |

## Calls

[integrationsSchemaReady()](/code/functions/integrationsSchemaReady.md)

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsEscalate()](/code/functions/integrationsEscalate.md)

