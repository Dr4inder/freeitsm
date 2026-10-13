# oidcSyncProfile()

Copy profile details from the identity provider onto a local account.

🔴 Call this ONLY after the account has passed every access check (active,
assigned to this provider). Writing first and refusing afterwards lets a
provider that is about to be turned away edit someone else's record.

Only runs when the provider's profile_sync_mode is 'always'. 'initial' is
handled at creation time (oidcCreateAnalyst / the requester INSERT), and
'never' does nothing.

```php
function oidcSyncProfile(
    PDO $conn,
    array $provider,
    string $table,
    array $record,
    array $claims,
    string $name
): void
```

Defined in [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), line 347.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$table` | `string` |  | 'analysts' or 'users' - never user input |
| `$record` | `array` |  |  |
| `$claims` | `array` |  |  |
| `$name` | `string` |  |  |

**Returns:** `void`

## Calls

[oidcExtractProfileAttributes()](/code/functions/oidcExtractProfileAttributes.md)

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md) - in [completeSelfServiceSso()](/code/functions/completeSelfServiceSso.md)

