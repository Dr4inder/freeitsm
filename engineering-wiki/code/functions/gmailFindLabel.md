# gmailFindLabel()

Find one label by display name, case-insensitively. Null when there is no match.

```php
function gmailFindLabel(array $labels, string $name): ?array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 180.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$labels` | `array` |  |  |
| `$name` | `string` |  |  |

**Returns:** `?array`

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailResolveListLabelId()](/code/functions/gmailResolveListLabelId.md), [gmailVerifyFolder()](/code/functions/gmailVerifyFolder.md)

