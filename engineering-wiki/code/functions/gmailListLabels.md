# gmailListLabels()

Every label on the account, as Gmail returns them (id, name, type, ...).

```php
function gmailListLabels(string $accessToken): array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 171.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |

**Returns:** `array`

## Calls

[gmailApiGet()](/code/functions/gmailApiGet.md)

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailResolveListLabelId()](/code/functions/gmailResolveListLabelId.md), [gmailVerifyFolder()](/code/functions/gmailVerifyFolder.md)

