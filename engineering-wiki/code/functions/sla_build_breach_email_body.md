# sla_build_breach_email_body()

Render the HTML body for a breach / warning email.

```php
function sla_build_breach_email_body(
    array $merge,
    array $target,
    string $targetLabel,
    string $headline,
    string $trigger
): string
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 319.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$merge` | `array` |  |  |
| `$target` | `array` |  |  |
| `$targetLabel` | `string` |  |  |
| `$headline` | `string` |  |  |
| `$trigger` | `string` |  |  |

**Returns:** `string`

## Calls

[sla_format_minutes()](/code/functions/sla_format_minutes.md)

## Called from

- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_send_breach_email()](/code/functions/sla_send_breach_email.md)

