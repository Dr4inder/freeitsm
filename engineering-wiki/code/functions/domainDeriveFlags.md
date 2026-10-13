# domainDeriveFlags()

Locks and states the statuses imply.

⚠️ REGISTRY LOCK IS INFERRED. It is the three server*Prohibited statuses
together — which is how registries apply it, but a registry can set them for
other reasons too (a legal hold). The screen says "likely registry-locked".

```php
function domainDeriveFlags(array &$r, string $name = ''): void
```

Defined in [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md), line 252.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |
| `$name` | `string` | `''` |  |

**Returns:** `void`

## Calls

[domainTransferLockNotApplicable()](/code/functions/domainTransferLockNotApplicable.md)

## Called from

- [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md) - in [domainRdapLookup()](/code/functions/domainRdapLookup.md), [domainWhoisLookup()](/code/functions/domainWhoisLookup.md)

