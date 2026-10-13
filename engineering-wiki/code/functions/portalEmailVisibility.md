# portalEmailVisibility()

Apply the policy to one message.

```php
function portalEmailVisibility(array $email, ?string $requesterEmail, string $policy): array
```

Defined in [includes/portal_visibility.php](/code/files/includes/portal_visibility.php.md), line 145.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$email` | `array` |  |  |
| `$requesterEmail` | `?string` |  |  |
| `$policy` | `string` |  |  |

**Returns:** array{visible: bool, attachments: bool} visible     — show the message in the thread at all attachments — allow its attachments to be listed AND downloaded

## Calls

[portalEmailInvolvesRequester()](/code/functions/portalEmailInvolvesRequester.md)

## Called from

- [api/self-service/get_attachment.php](/code/files/api/self-service/get_attachment.php.md)
- [api/self-service/get_ticket_detail.php](/code/files/api/self-service/get_ticket_detail.php.md)

