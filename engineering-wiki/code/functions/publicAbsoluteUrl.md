# publicAbsoluteUrl()

An absolute URL for an app-relative path, e.g. 'self-service/tickets.php?id=9'.

```php
function publicAbsoluteUrl(PDO $conn, string $path): string
```

Defined in [includes/public_url.php](/code/files/includes/public_url.php.md), line 162.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$path` | `string` |  |  |

**Returns:** `string`

## Calls

[publicBaseUrl()](/code/functions/publicBaseUrl.md)

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)
- [api/tickets/get_public_base_url.php](/code/files/api/tickets/get_public_base_url.php.md)
- [includes/asset_labels.php](/code/files/includes/asset_labels.php.md) - in [assetLabelUrl()](/code/functions/assetLabelUrl.md)
- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsAbsoluteUrl()](/code/functions/integrationsAbsoluteUrl.md)
- [includes/managers.php](/code/files/includes/managers.php.md) - in [managersEmailNewTicket()](/code/functions/managersEmailNewTicket.md)
- [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) - in [notificationsTaskAssignedEmail()](/code/functions/notificationsTaskAssignedEmail.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::lessonToKnowledge`
- [includes/template_email.php](/code/files/includes/template_email.php.md) - in [buildTicketMergeData()](/code/functions/buildTicketMergeData.md)

