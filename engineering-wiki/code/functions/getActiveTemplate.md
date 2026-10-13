# getActiveTemplate()

Get the first active template for a given event trigger.

```php
function getActiveTemplate(PDO $conn, string $eventTrigger, ?string $recipientEmail = null): ?array
```

Defined in [includes/template_email.php](/code/files/includes/template_email.php.md), line 225.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$eventTrigger` | `string` |  |  |
| `$recipientEmail` | `?string` | `null` |  |

**Returns:** `?array`

## Calls

[templateSelectForRecipient()](/code/functions/templateSelectForRecipient.md)

*Nothing calls this function by name.*

