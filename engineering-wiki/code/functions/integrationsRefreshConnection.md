# integrationsRefreshConnection()

Refresh the cached status of every link on one connection. The poll cron's unit of work.

Batched through `fetchIssues()` — one JQL call rather than one per link — and
only rows whose status actually moved are written, so a quiet day costs one
read and no writes.

```php
function integrationsRefreshConnection(PDO $conn, array $connection): array
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1373.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$connection` | `array` |  |  |

**Returns:** array ['checked'=>int, 'changed'=>int, 'changes'=>[ ['link'=>row, 'from'=>?string, 'to'=>?string], … ]]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1378 | `integrationsRefreshConnection` | read [integration_links](/code/tables/integration_links.md) |  |
| 1397 | `integrationsRefreshConnection` | **update** [integration_links](/code/tables/integration_links.md) (`status_name`, `status_category`, `assignee_name`, `last_synced_datetime`) |  |

## Calls

[integrationsEmitTrackerEvent()](/code/functions/integrationsEmitTrackerEvent.md), [integrationsProviderFor()](/code/functions/integrationsProviderFor.md), [integrationsSchemaReady()](/code/functions/integrationsSchemaReady.md)

## Called from

- [cron/integration_poll.php](/code/files/cron/integration_poll.php.md)

