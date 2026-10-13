# webhookEncrypt()

Encrypt if we can; fall back to plaintext rather than breaking the webhook.

```php
function webhookEncrypt(?string $v): ?string
```

Defined in [includes/webhook_delivery.php](/code/files/includes/webhook_delivery.php.md), line 46.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` | `?string` |  |  |

**Returns:** `?string`

## Calls

[encryptValue()](/code/functions/encryptValue.md)

## Called from

- [api/workflow/save.php](/code/files/api/workflow/save.php.md)
- [includes/webhook_delivery.php](/code/files/includes/webhook_delivery.php.md) - in [webhookEnqueue()](/code/functions/webhookEnqueue.md)

