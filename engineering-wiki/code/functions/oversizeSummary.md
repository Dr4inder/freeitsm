# oversizeSummary()

"big.zip (40 MB), video.mp4 (30 MB)" - what broke the limits, for the log's reason column.

```php
function oversizeSummary(array $atts, array $plan): string
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1426.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$atts` | `array` |  |  |
| `$plan` | `array` |  |  |

**Returns:** `string`

## Calls

[oversizeMbWords()](/code/functions/oversizeMbWords.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

