# ldapFindUser()

Find exactly one directory entry for `$login`. Returns the raw entry array (from ldap_get_entries) or null when not found. Throws when the search itself fails or matches more than one user.

```php
function ldapFindUser($ds, array $p, string $login): ?array
```

Defined in [includes/ldap.php](/code/files/includes/ldap.php.md), line 160.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ds` |  |  |  |
| `$p` | `array` |  |  |
| `$login` | `string` |  |  |

**Returns:** `?array`

## Called from

- [includes/ldap.php](/code/files/includes/ldap.php.md) - in [ldapAuthenticate()](/code/functions/ldapAuthenticate.md)

