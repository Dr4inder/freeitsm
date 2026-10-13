# integrationsProviderFor()

provider string → concrete connector.

```php
function integrationsProviderFor(array $connection): IssueTrackerProvider
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 274.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$connection` | `array` |  |  |

**Returns:** `IssueTrackerProvider`

## Called from

- [api/integrations/test_connection.php](/code/files/api/integrations/test_connection.php.md)
- [api/integrations/tracker_options.php](/code/files/api/integrations/tracker_options.php.md)
- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsEscalate()](/code/functions/integrationsEscalate.md), [integrationsSendAttachments()](/code/functions/integrationsSendAttachments.md), [integrationsPullComments()](/code/functions/integrationsPullComments.md), [integrationsRefreshConnection()](/code/functions/integrationsRefreshConnection.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_note_to_tracker`

