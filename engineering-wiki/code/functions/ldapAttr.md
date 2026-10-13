# ldapAttr()

Read a single attribute out of an `ldap_get_entries()` row (keys are lowercased).

```php
function ldapAttr(array $entry, ?string $attr): string
```

Defined in [includes/ldap.php](/code/files/includes/ldap.php.md), line 197.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$entry` | `array` |  |  |
| `$attr` | `?string` |  |  |

**Returns:** `string`

## Called from

- [includes/ldap.php](/code/files/includes/ldap.php.md) - in [ldapAuthenticate()](/code/functions/ldapAuthenticate.md)

