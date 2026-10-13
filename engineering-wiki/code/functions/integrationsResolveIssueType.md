# integrationsResolveIssueType()

Our ticket type → the tracker's issue type. Falls back to the `*` row, so an install can say "everything is a Task" without listing every type.

```php
function integrationsResolveIssueType(array $maps, ?int $ticketTypeId): ?string
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1026.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$maps` | `array` |  |  |
| `$ticketTypeId` | `?int` |  |  |

**Returns:** `?string`

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsEscalate()](/code/functions/integrationsEscalate.md)

