# domainPurposeIsNonMail()

Purposes that should never send or receive mail, so get "lock it down" advice.

```php
function domainPurposeIsNonMail(string $purpose): bool
```

Defined in [includes/domains/names.php](/code/files/includes/domains/names.php.md), line 147.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$purpose` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md)

