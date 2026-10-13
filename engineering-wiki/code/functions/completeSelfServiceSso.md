# completeSelfServiceSso()

Complete an SSO sign-in for the SELF-SERVICE portal.

Mirrors the analyst flow against the requester `users` table:
  1) existing link by (provider, sub),
  2) match an existing requester by verified email,
  3) just-in-time create (if the provider allows it).
Then sets the self-service session (SSO bypasses local TOTP) and lands in
the portal. Never returns — it redirects and exits.

Also reached from the ANALYST login, when someone with no analyst account
is sent on to the portal (the provider's analyst_fallback_mode, #155).

Deliberate difference from analysts: a requester matched by verified email
who is still UNASSIGNED is auto-claimed onto this provider, rather than
rejected. Requesters are low-privilege and self-onboarding (a ticket-created
contact starts passwordless and unassigned), so we don't require an admin to
pre-enrol every customer. An already-assigned requester is still strictly
isolated to their own provider.

```php
function completeSelfServiceSso(
    PDO $conn,
    array $provider,
    int $providerId,
    string $sub,
    string $email,
    bool $emailVerified,
    string $name,
    array $tokens,
    array $claims = []
): void
```

Defined in [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), line 446.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$providerId` | `int` |  |  |
| `$sub` | `string` |  |  |
| `$email` | `string` |  |  |
| `$emailVerified` | `bool` |  |  |
| `$name` | `string` |  |  |
| `$tokens` | `array` |  |  |
| `$claims` | `array` | `[]` |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 451 | `completeSelfServiceSso` | read [user_sso_identities](/code/tables/user_sso_identities.md) |  |
| 469 | `completeSelfServiceSso` | **update** [user_sso_identities](/code/tables/user_sso_identities.md) (`last_login_datetime`, `email`) |  |
| 478 | `completeSelfServiceSso` | read [users](/code/tables/users.md) |  |
| 488 | `completeSelfServiceSso` | **update** [users](/code/tables/users.md) (`auth_provider_id`) |  |
| 513 | `completeSelfServiceSso` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `job_title`, `department`, `office`, `phone`, `mobile`, `auth_provider_id`, `tenant_id`, `created_at`) |  |
| 528 | `completeSelfServiceSso` | **insert** [user_sso_identities](/code/tables/user_sso_identities.md) (`user_id`, `provider_id`, `subject`, `email`, `linked_datetime`, `last_login_datetime`) |  |

## Calls

[oidcExtractProfileAttributes()](/code/functions/oidcExtractProfileAttributes.md), [oidcSyncProfile()](/code/functions/oidcSyncProfile.md), [requesterIsActive()](/code/functions/requesterIsActive.md), [resolveTenantForNewUser()](/code/functions/resolveTenantForNewUser.md), [sessionPromoteToAuthenticated()](/code/functions/sessionPromoteToAuthenticated.md), [ssLoadUser()](/code/functions/ssLoadUser.md), [ssoBail()](/code/functions/ssoBail.md), [ssoClearDanglingLink()](/code/functions/ssoClearDanglingLink.md)

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md)

