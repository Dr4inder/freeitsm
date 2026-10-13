# includes/sso_identity.php

> PHP - 227 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ssoClearDanglingLink()](/code/functions/ssoClearDanglingLink.md) | 40 | Drop a sign-in link whose account no longer exists. |
| [ssoJitColumnsReady()](/code/functions/ssoJitColumnsReady.md) | 59 | Have the discussion #155 provider columns (auto_create_analysts, analyst_fallback_mode, profile_sync_mode) been added yet? |
| [ssoProfileSyncLocks()](/code/functions/ssoProfileSyncLocks.md) | 82 | Is this provider rewriting profile details on every sign-in? (discussion #155) |
| [ssoAnalystProfileLocked()](/code/functions/ssoAnalystProfileLocked.md) | 90 | Does the given analyst's sign-in provider lock their My details fields? Safe before Database Verification (answers false). |
| [ssoPortalRoutingColumnsReady()](/code/functions/ssoPortalRoutingColumnsReady.md) | 109 | Have the GH #147 portal routing columns (portal_email_domains, portal_show_button) been added yet? Same reason as `ssoJitColumnsReady()`: the portal login and the resolver must keep working on an upgraded install that has not run Database Verification. The two arrive together. |
| [ssoParseEmailDomains()](/code/functions/ssoParseEmailDomains.md) | 133 | Split what an admin typed into the "Email domains" box into clean domains. |
| [ssoPortalProviderForEmail()](/code/functions/ssoPortalProviderForEmail.md) | 160 | The OIDC provider whose "Email domains" list holds this address's domain, or null. Used only by the portal's email-first router (GH #147). |
| [ssoJitCompanyReady()](/code/functions/ssoJitCompanyReady.md) | 182 | True once Database Verification has added auth_providers.jit_company_access (3.5.0). |
| [ssoApplyJitCompanies()](/code/functions/ssoApplyJitCompanies.md) | 205 | Which companies an analyst that SSO or LDAP has just CREATED can see (3.5.0). Called by `oidcCreateAnalyst()` and `ldapCreateAnalyst()` right after the insert. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 63 | `ssoJitColumnsReady` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 93 | `ssoAnalystProfileLocked` | read [analysts](/code/tables/analysts.md), read [auth_providers](/code/tables/auth_providers.md) |  |
| 113 | `ssoPortalRoutingColumnsReady` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 168 | `ssoPortalProviderForEmail` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 185 | `ssoJitCompanyReady` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 209 | `ssoApplyJitCompanies` | read [auth_providers](/code/tables/auth_providers.md) |  |
| 214 | `ssoApplyJitCompanies` | **update** [analysts](/code/tables/analysts.md) (`can_access_all_tenants`) |  |
| 215 | `ssoApplyJitCompanies` | **delete** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) |  |
| 218 | `ssoApplyJitCompanies` | **insert** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) (`analyst_id`, `tenant_id`) |  |
| 223 | `ssoApplyJitCompanies` | **update** [analysts](/code/tables/analysts.md) (`can_access_all_tenants`) |  |

## How it hangs together

**Includes:** [includes/tenancy.php](/code/files/includes/tenancy.php.md)

**Included by:** [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), [api/auth/resolve_login.php](/code/files/api/auth/resolve_login.php.md), [api/myaccount/get_signatures.php](/code/files/api/myaccount/get_signatures.php.md), [api/myaccount/save_profile.php](/code/files/api/myaccount/save_profile.php.md), [api/system/get_sso_providers.php](/code/files/api/system/get_sso_providers.php.md), [api/system/save_sso_provider.php](/code/files/api/system/save_sso_provider.php.md), [includes/ldap.php](/code/files/includes/ldap.php.md), [includes/oidc.php](/code/files/includes/oidc.php.md), [includes/users.php](/code/files/includes/users.php.md), [self-service/login.php](/code/files/self-service/login.php.md)

**Calls:** [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

