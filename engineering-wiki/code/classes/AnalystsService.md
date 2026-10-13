# AnalystsService

> Class in [includes/services/analysts.php](/code/files/includes/services/analysts.php.md), line 35

## Methods

| Method | What it does |
|---|---|
| [load()](#load) | The analyst row, or not_found. |
| [create()](#create) | Create an analyst. `$in`: email (required), full_name, username (made unique), auth_provider_id. Returns the new id. |
| [update()](#update) | Change an analyst. `$in`: any of full_name, email, is_active, auth_provider_id. Setting auth_provider_id switches off "Follow team" (GH #41), which would otherwise replace it on the next team change. |
| [access()](#access) | What the analyst has been given directly, plus (when `$effective`) what they end up with once team grants and hand-assigned roles are counted: effective.modules null = every module effective.companies every company id they can reach effective.capabilities ⚠️ The effective helpers cache per request, so only ask after any write. |
| [setAccess()](#setaccess) | Set access. `$in`: any of is_admin, all_modules, modules[], all_companies, companies[], capabilities[]. Each list REPLACES what the analyst has in that part; anything not sent stays as it is. |
| [managedRoleId()](#managedroleid) | The REST-API-managed role's id for an analyst, or null. |
| [assertNotLastAdmin()](#assertnotlastadmin) | Refuse when this analyst is the last ACTIVE administrator - removing them would leave nobody able to open System. Same rule as System -> Analysts. |
| [writeManagedRole()](#writemanagedrole) |  |
| [moduleKeys()](#modulekeys) |  |
| [companyIds()](#companyids) |  |
| [capabilityKeys()](#capabilitykeys) |  |
| [stringList()](#stringlist) |  |
| [flag()](#flag) |  |
| [cleanEmail()](#cleanemail) |  |
| [assertEmailFree()](#assertemailfree) |  |
| [providerId()](#providerid) |  |
| [uniqueUsername()](#uniqueusername) | The asked-for username, else the email's local part, made unique - the SSO sign-up rule. |

### load

*public static* - line 38

The analyst row, or not_found.

```php
function load(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 40 | `AnalystsService::load` | read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md)

### create

*public static* - line 53

Create an analyst. `$in`: email (required), full_name, username (made unique), auth_provider_id. Returns the new id.

```php
function create(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 71 | `AnalystsService::create` | **insert** [analysts](/code/tables/analysts.md) (`username`, `password_hash`, `full_name`, `email`, `is_active`, `auth_provider_id`, `is_admin`, `can_access_all_modules`, `can_access_all_tenants`, `created_datetime`, `last_modified_datetime`) |  |

**Called from:** [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md)

### update

*public static* - line 83

Change an analyst. `$in`: any of full_name, email, is_active, auth_provider_id. Setting auth_provider_id switches off "Follow team" (GH #41), which would otherwise replace it on the next team change.

```php
function update(PDO $conn, ActorContext $ctx, int $id, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `AnalystsService::update` | **update** [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md)

### access

*public static* - line 142

What the analyst has been given directly, plus (when `$effective`) what they end up with once team grants and hand-assigned roles are counted: effective.modules null = every module effective.companies every company id they can reach effective.capabilities ⚠️ The effective helpers cache per request, so only ask after any write.

```php
function access(PDO $conn, int $id, bool $effective = true): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$effective` | `bool` | `true` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 145 | `AnalystsService::access` | read [analyst_modules](/code/tables/analyst_modules.md) |  |
| 147 | `AnalystsService::access` | read [analyst_tenant_access](/code/tables/analyst_tenant_access.md) |  |
| 151 | `AnalystsService::access` | read [rbac_role_capabilities](/code/tables/rbac_role_capabilities.md) |  |

**Called from:** [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md)

### setAccess

*public static* - line 178

Set access. `$in`: any of is_admin, all_modules, modules[], all_companies, companies[], capabilities[]. Each list REPLACES what the analyst has in that part; anything not sent stays as it is.

```php
function setAccess(PDO $conn, ActorContext $ctx, int $id, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 204 | `AnalystsService::setAccess` | **update** [analysts](/code/tables/analysts.md) (`is_admin`, `can_access_all_modules`, `can_access_all_tenants`, `last_modified_datetime`) |  |
| 209 | `AnalystsService::setAccess` | **delete** [analyst_modules](/code/tables/analyst_modules.md) |  |
| 210 | `AnalystsService::setAccess` | **insert** [analyst_modules](/code/tables/analyst_modules.md) (`analyst_id`, `module_key`) |  |
| 214 | `AnalystsService::setAccess` | **delete** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) |  |
| 215 | `AnalystsService::setAccess` | **insert** [analyst_tenant_access](/code/tables/analyst_tenant_access.md) (`analyst_id`, `tenant_id`) |  |

**Called from:** [api/v1/resources/analysts.php](/code/files/api/v1/resources/analysts.php.md), [includes/sso_claims.php](/code/files/includes/sso_claims.php.md)

### managedRoleId

*public static* - line 229

The REST-API-managed role's id for an analyst, or null.

```php
function managedRoleId(PDO $conn, int $analystId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 232 | `AnalystsService::managedRoleId` | read [rbac_roles](/code/tables/rbac_roles.md) |  |

### assertNotLastAdmin

*public static* - line 245

Refuse when this analyst is the last ACTIVE administrator - removing them would leave nobody able to open System. Same rule as System -> Analysts.

```php
function assertNotLastAdmin(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 247 | `AnalystsService::assertNotLastAdmin` | read [analysts](/code/tables/analysts.md) |  |

### writeManagedRole

*private static* - line 257

```php
function writeManagedRole(PDO $conn, ActorContext $ctx, array $a, array $caps): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$a` | `array` |  |  |
| `$caps` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 263 | `AnalystsService::writeManagedRole` | **insert** [rbac_roles](/code/tables/rbac_roles.md) (`name`, `description`, `is_active`, `created_by_id`, `managed_for_analyst_id`, `created_datetime`, `updated_datetime`) |  |
| 273 | `AnalystsService::writeManagedRole` | **delete** [rbac_role_capabilities](/code/tables/rbac_role_capabilities.md) |  |
| 274 | `AnalystsService::writeManagedRole` | **insert** [rbac_role_capabilities](/code/tables/rbac_role_capabilities.md) (`role_id`, `capability_key`) |  |
| 276 | `AnalystsService::writeManagedRole` | **insert** [rbac_analyst_roles](/code/tables/rbac_analyst_roles.md) (`analyst_id`, `role_id`, `created_datetime`) |  |
| 278 | `AnalystsService::writeManagedRole` | **update** [rbac_roles](/code/tables/rbac_roles.md) (`updated_datetime`) |  |

### moduleKeys

*private static* - line 281

```php
function moduleKeys($v): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### companyIds

*private static* - line 292

```php
function companyIds(PDO $conn, $v): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$v` |  |  |  |

### capabilityKeys

*private static* - line 306

```php
function capabilityKeys($v): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### stringList

*private static* - line 320

```php
function stringList($v, string $field): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$field` | `string` |  |  |

### flag

*private static* - line 328

```php
function flag($v, string $field): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$field` | `string` |  |  |

### cleanEmail

*private static* - line 334

```php
function cleanEmail($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### assertEmailFree

*private static* - line 344

```php
function assertEmailFree(PDO $conn, string $email, int $exceptId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$email` | `string` |  |  |
| `$exceptId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 346 | `AnalystsService::assertEmailFree` | read [analysts](/code/tables/analysts.md) |  |

### providerId

*private static* - line 353

```php
function providerId(PDO $conn, $v): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$v` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 357 | `AnalystsService::providerId` | read [auth_providers](/code/tables/auth_providers.md) |  |

### uniqueUsername

*private static* - line 366

The asked-for username, else the email's local part, made unique - the SSO sign-up rule.

```php
function uniqueUsername(PDO $conn, string $want, string $email): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$want` | `string` |  |  |
| `$email` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 370 | `AnalystsService::uniqueUsername` | read [analysts](/code/tables/analysts.md) |  |

