# ldapTestConnection()

Admin "Test" helper: prove the service account can connect, bind and search. Optionally also verify one real user's credentials. Returns ['ok' => bool, 'error' => ?string, 'found' => ?array].

```php
function ldapTestConnection(array $provider, string $login = '', string $password = ''): array
```

Defined in [includes/ldap.php](/code/files/includes/ldap.php.md), line 826.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$provider` | `array` |  |  |
| `$login` | `string` | `''` |  |
| `$password` | `string` | `''` |  |

**Returns:** `array`

## Calls

[ldapAuthenticate()](/code/functions/ldapAuthenticate.md), [ldapBindService()](/code/functions/ldapBindService.md), [ldapOpen()](/code/functions/ldapOpen.md)

## Called from

- [api/system/test_ldap_connection.php](/code/files/api/system/test_ldap_connection.php.md)

