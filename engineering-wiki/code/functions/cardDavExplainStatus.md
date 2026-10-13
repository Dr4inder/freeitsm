# cardDavExplainStatus()

Turn an HTTP status into something an operator can act on.

Deliberately not "HTTP 401" — the whole point of these strings is that the
person reading them is configuring a server, not debugging one.

```php
function cardDavExplainStatus(int $status): string
```

Defined in [includes/carddav.php](/code/files/includes/carddav.php.md), line 191.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$status` | `int` |  |  |

**Returns:** `string`

## Called from

- [includes/carddav.php](/code/files/includes/carddav.php.md) - in [cardDavRequest()](/code/functions/cardDavRequest.md)
- [includes/carddav_create.php](/code/files/includes/carddav_create.php.md) - in [cardDavCreateContact()](/code/functions/cardDavCreateContact.md)
- [includes/carddav_write.php](/code/files/includes/carddav_write.php.md) - in [cardDavPutCard()](/code/functions/cardDavPutCard.md), [cardDavGetCard()](/code/functions/cardDavGetCard.md), [cardDavCanWrite()](/code/functions/cardDavCanWrite.md)

