# integrationsDecodeCredentials()

Decrypt + JSON-decode a stored credentials blob (never throws).

```php
function integrationsDecodeCredentials($stored): array
```

Defined in [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), line 287.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stored` |  |  |  |

**Returns:** `array`

## Calls

[decryptValue()](/code/functions/decryptValue.md)

## Called from

- [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md) - in [integrationsLoadConnection()](/code/functions/integrationsLoadConnection.md), [integrationsListConnections()](/code/functions/integrationsListConnections.md)

