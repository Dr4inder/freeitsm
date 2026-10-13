# integrationsLooksLikePriorityRejection()

Does this error look like the tracker rejecting our priority?

Used to decide whether to retry the create without one. Deliberately narrow:
retrying blindly on any failure could turn a genuine error into an issue we
did not mean to raise.

```php
function integrationsLooksLikePriorityRejection(string $message): bool
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 1056.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$message` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsEscalate()](/code/functions/integrationsEscalate.md)

