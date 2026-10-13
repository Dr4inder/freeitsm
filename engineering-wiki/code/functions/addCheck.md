# addCheck()

Appends one result row (key, label, status, detail and an optional fix) to the global `$checks` list the diagnosis returns.

```php
function addCheck(
    string $key,
    string $label,
    string $status,
    string $detail,
    string $fix = ''
): void
```

Defined in [api/messaging/slack_diagnose.php](/code/files/api/messaging/slack_diagnose.php.md), line 73.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$label` | `string` |  |  |
| `$status` | `string` |  |  |
| `$detail` | `string` |  |  |
| `$fix` | `string` | `''` |  |

**Returns:** `void`

## Called from

- [api/messaging/slack_diagnose.php](/code/files/api/messaging/slack_diagnose.php.md)

