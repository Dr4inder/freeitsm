# ssoApplyJitCompanies()

Which companies an analyst that SSO or LDAP has just CREATED can see (3.5.0). Called by `oidcCreateAnalyst()` and `ldapCreateAnalyst()` right after the insert.

analysts.can_access_all_tenants defaults to 1, so until now every analyst a
provider created could see every company. On a multi-company install a
provider can now say:
  all       - every company (the default: what it always did);
  provider  - only the provider's own company (System -> SSO -> Company), or
              the Default company for a provider that belongs to no company;
  none      - no company until an administrator grants some.
Only at creation: an analyst whose access was changed by hand is never touched.
Single-company installs: nothing to decide.

```php
function ssoApplyJitCompanies(PDO $conn, int $providerId, int $analystId): void
```

Defined in [includes/sso_identity.php](/code/files/includes/sso_identity.php.md), line 205.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$providerId` | `int` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 209 | `ssoApplyJitCompanies` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 214 | `ssoApplyJitCompanies` | **update** [analysts](/code/tables/analysts.md) (`can_access_all_tenants`) |  |
| 215 | `ssoApplyJitCompanies` | **delete** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) |  |
| 218 | `ssoApplyJitCompanies` | **insert** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) (`analyst_id`, `tenant_id`) |  |
| 223 | `ssoApplyJitCompanies` | **update** [analysts](/code/tables/analysts.md) (`can_access_all_tenants`) |  |

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [ssoJitCompanyReady()](/code/functions/ssoJitCompanyReady.md)

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md) - in [oidcCreateAnalyst()](/code/functions/oidcCreateAnalyst.md)
- [includes/ldap.php](/code/files/includes/ldap.php.md) - in [ldapCreateAnalyst()](/code/functions/ldapCreateAnalyst.md)

