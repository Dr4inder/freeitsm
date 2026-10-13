# DomainsService

> Class in [includes/services/domains.php](/code/files/includes/services/domains.php.md), line 43

## Methods

| Method | What it does |
|---|---|
| [fieldMap()](#fieldmap) | The fields a person (or an API key) may set, and how each is validated. domain_name and auth_code are handled separately. |
| [bulkFields()](#bulkfields) | Fields the bulk editor may set on many domains at once. |
| [saveDomain()](#savedomain) | Create (no id) or update (id present) a domain. Returns ['id', 'created']. |
| [createDomain()](#createdomain) |  |
| [updateDomain()](#updatedomain) |  |
| [deleteDomain()](#deletedomain) | Delete a domain and everything that hangs off it. Returns the id. |
| [bulkAdd()](#bulkadd) | Add many domains from a pasted list (one per line, or separated by commas or spaces). Every name goes through the same create path as a single add. |
| [bulkUpdate()](#bulkupdate) | Set the same fields on many domains. Each goes through `updateDomain()`, so each gets its own history rows and scope check; a domain the caller cannot reach is reported, not silently skipped. |
| [refreshLookup()](#refreshlookup) | Look a domain up now and apply the answer. For the "Refresh" button and the API. |
| [applyLookup()](#applylookup) | Write a lookup result onto a domain, under the operator's overwrite rule. |
| [recordLookupError()](#recordlookuperror) |  |
| [runChecks()](#runchecks) | Run the health/security checks for one domain, store the result, and compare against the last run. Returns the check result plus 'changes'. |
| [revealAuthCode()](#revealauthcode) | The decrypted auth code, for somebody the adapter has already checked holds Cap::DOMAINS_AUTH_CODES. Recorded in the domain's history unless the operator switched that off. |
| [saveStatus()](#savestatus) |  |
| [deleteStatus()](#deletestatus) |  |
| [saveRegistrarAccount()](#saveregistraraccount) |  |
| [deleteRegistrarAccount()](#deleteregistraraccount) |  |
| [loadRow()](#loadrow) |  |
| [loadForActor()](#loadforactor) | Load a domain the caller may touch — out of scope reads as not found. |
| [loadAccountForActor()](#loadaccountforactor) |  |
| [assertScope()](#assertscope) |  |
| [storeTenant()](#storetenant) | The Default company is stored as NULL, the way every scoped table does. |
| [validateField()](#validatefield) |  |
| [fieldReady()](#fieldready) | Is this field's column there yet? The #153 and #162 columns arrive with Database Verification. |
| [normaliseParties()](#normaliseparties) | #162: a domain has ONE customer - a person, or a supplier (optionally with one of its contacts) - and ONE technical contact - a supplier contact, or an analyst. Setting one kind clears the other, so a caller (the edit dialog, or a REST PATCH naming just one field) never has to know which kind was there before. Naming both kinds at once is refused rather than guessed. Clearing a field clears only that field, except that clearing the supplier also clears its contact. |
| [lookup()](#lookup) |  |
| [requireAnalyst()](#requireanalyst) |  |
| [str()](#str) |  |
| [same()](#same) |  |
| [matchSupplier()](#matchsupplier) | A supplier whose legal or trading name matches the registry's registrar name. |
| [audit()](#audit) |  |
| [assertContractVisible()](#assertcontractvisible) | A domain may only be linked to a contract its editor can see - one in a company outside their reach is "unknown", as everywhere else - and, since contracts belong to a company (3.5.0), only to one in the DOMAIN's company. `$domainTenant` is the domain's stored company (NULL = Default). |
| [auditDisplay()](#auditdisplay) | Ids stored as names, so the history reads as English a year later. |
| [eventPayload()](#eventpayload) | The payload every domain.* event carries. |
| [dispatchCrud()](#dispatchcrud) |  |
| [afterDateChange()](#afterdatechange) | Expiry dates feed the calendar; keep it in step. Never fails the write. |

### fieldMap

*public static* - line 49

The fields a person (or an API key) may set, and how each is validated. domain_name and auth_code are handled separately.

```php
function fieldMap(): array
```

**Called from:** [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md)

### bulkFields

*public static* - line 89

Fields the bulk editor may set on many domains at once.

```php
function bulkFields(): array
```

### saveDomain

*public static* - line 106

Create (no id) or update (id present) a domain. Returns ['id', 'created'].

```php
function saveDomain(PDO $conn, ActorContext $ctx, array $in, ?int $tenantId = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` | `null` | the company a NEW domain belongs to (the adapter resolves it: the analyst's active company, or the API key's). Ignored on update — moving a domain between companies is not an edit. |

**Called from:** [api/domains/save.php](/code/files/api/domains/save.php.md)

### createDomain

*public static* - line 114

```php
function createDomain(
    PDO $conn,
    ActorContext $ctx,
    array $in,
    ?int $tenantId,
    string $source = 'app'
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` |  |  |
| `$source` | `string` | `'app'` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 127 | `DomainsService::createDomain` | read [domains](/code/tables/domains.md) |  |
| 147 | `DomainsService::createDomain` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 151 | `DomainsService::createDomain` | **insert** [domains](/code/tables/domains.md) |  |
| 156 | `DomainsService::createDomain` | **update** [domains](/code/tables/domains.md) (`auth_code`) |  |

**Called from:** [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### updateDomain

*public static* - line 165

```php
function updateDomain(PDO $conn, ActorContext $ctx, int $id, array $in, string $source = ''): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |
| `$source` | `string` | `''` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 178 | `DomainsService::updateDomain` | read [domains](/code/tables/domains.md) |  |
| 210 | `DomainsService::updateDomain` | **update** [domains](/code/tables/domains.md) |  |

**Called from:** [api/domains/auth_code.php](/code/files/api/domains/auth_code.php.md), [api/domains/links.php](/code/files/api/domains/links.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### deleteDomain

*public static* - line 221

Delete a domain and everything that hangs off it. Returns the id.

```php
function deleteDomain(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 237 | `DomainsService::deleteDomain` | **delete** [domains](/code/tables/domains.md) |  |

**Called from:** [api/domains/delete.php](/code/files/api/domains/delete.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### bulkAdd

*public static* - line 258

Add many domains from a pasted list (one per line, or separated by commas or spaces). Every name goes through the same create path as a single add.

```php
function bulkAdd(
    PDO $conn,
    ActorContext $ctx,
    string $text,
    array $defaults,
    ?int $tenantId,
    string $source = 'app'
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$text` | `string` |  |  |
| `$defaults` | `array` |  |  |
| `$tenantId` | `?int` |  |  |
| `$source` | `string` | `'app'` |  |

**Returns:** array{added:array<int,array{id:int,name:string}>, skipped:array<int,array{input:string,reason:string}>}

**Called from:** [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md)

### bulkUpdate

*public static* - line 287

Set the same fields on many domains. Each goes through `updateDomain()`, so each gets its own history rows and scope check; a domain the caller cannot reach is reported, not silently skipped.

```php
function bulkUpdate(PDO $conn, ActorContext $ctx, array $ids, array $fields): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ids` | `array` |  |  |
| `$fields` | `array` |  |  |

**Called from:** [api/domains/bulk_update.php](/code/files/api/domains/bulk_update.php.md)

### refreshLookup

*public static* - line 305

Look a domain up now and apply the answer. For the "Refresh" button and the API.

```php
function refreshLookup(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Called from:** [api/domains/process.php](/code/files/api/domains/process.php.md), [api/domains/save.php](/code/files/api/domains/save.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### applyLookup

*public static* - line 330

Write a lookup result onto a domain, under the operator's overwrite rule.

'always' — the registry is the record for the facts it holds.
'blanks' — it only fills fields nobody has typed into.

Registry statuses are never typed by people, so they always follow the
registry. A typed expiry date on a registry that publishes none (.de) is
never blanked by that registry's silence: a null answer is "not published",
not "no date".

```php
function applyLookup(PDO $conn, int $id, array $r, ?int $analystId = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$r` | `array` |  |  |
| `$analystId` | `?int` | `null` |  |

**Returns:** array<int,array{field:string,old:?string,new:?string}>

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 385 | `DomainsService::applyLookup` | **update** [domains](/code/tables/domains.md) |  |

**Called from:** [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### recordLookupError

*public static* - line 394

```php
function recordLookupError(PDO $conn, int $id, string $error): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |
| `$error` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 396 | `DomainsService::recordLookupError` | **update** [domains](/code/tables/domains.md) (`last_lookup_datetime`, `last_lookup_error`) |  |

**Called from:** [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### runChecks

*public static* - line 410

Run the health/security checks for one domain, store the result, and compare against the last run. Returns the check result plus 'changes'.

```php
function runChecks(PDO $conn, ?ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `?ActorContext` |  | null when the scheduled run calls it |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 421 | `DomainsService::runChecks` | **update** [domains](/code/tables/domains.md) (`check_results`, `security_score`, `security_grade`, `ssl_expiry_date`, `ssl_issuer`, `watch_baseline`, `last_check_datetime`) |  |

**Called from:** [api/domains/process.php](/code/files/api/domains/process.php.md), [api/domains/save.php](/code/files/api/domains/save.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### revealAuthCode

*public static* - line 477

The decrypted auth code, for somebody the adapter has already checked holds Cap::DOMAINS_AUTH_CODES. Recorded in the domain's history unless the operator switched that off.

```php
function revealAuthCode(PDO $conn, ActorContext $ctx, int $id): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Called from:** [api/domains/auth_code.php](/code/files/api/domains/auth_code.php.md)

### saveStatus

*public static* - line 492

```php
function saveStatus(PDO $conn, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 502 | `DomainsService::saveStatus` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 507 | `DomainsService::saveStatus` | **update** [domain_statuses](/code/tables/domain_statuses.md) (`name`, `colour`, `alerts_enabled`, `is_active`, `display_order`) |  |
| 511 | `DomainsService::saveStatus` | **insert** [domain_statuses](/code/tables/domain_statuses.md) (`name`, `colour`, `alerts_enabled`, `is_active`, `display_order`, `created_datetime`) |  |

**Called from:** [api/domains/statuses.php](/code/files/api/domains/statuses.php.md)

### deleteStatus

*public static* - line 516

```php
function deleteStatus(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 518 | `DomainsService::deleteStatus` | read [domains](/code/tables/domains.md) |  |
| 523 | `DomainsService::deleteStatus` | **delete** [domain_statuses](/code/tables/domain_statuses.md) |  |

**Called from:** [api/domains/statuses.php](/code/files/api/domains/statuses.php.md)

### saveRegistrarAccount

*public static* - line 530

```php
function saveRegistrarAccount(PDO $conn, ActorContext $ctx, array $in, ?int $tenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 546 | `DomainsService::saveRegistrarAccount` | **update** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) (`supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes`) |  |
| 554 | `DomainsService::saveRegistrarAccount` | **insert** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) (`supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes`, `tenant_id`, `created_by`, `created_datetime`) |  |

**Called from:** [api/domains/accounts.php](/code/files/api/domains/accounts.php.md)

### deleteRegistrarAccount

*public static* - line 560

```php
function deleteRegistrarAccount(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 563 | `DomainsService::deleteRegistrarAccount` | **update** [domains](/code/tables/domains.md) (`registrar_account_id`) |  |
| 564 | `DomainsService::deleteRegistrarAccount` | **delete** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

**Called from:** [api/domains/accounts.php](/code/files/api/domains/accounts.php.md)

### loadRow

*public static* - line 571

```php
function loadRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 573 | `DomainsService::loadRow` | read [domains](/code/tables/domains.md) |  |

### loadForActor

*public static* - line 581

Load a domain the caller may touch — out of scope reads as not found.

```php
function loadForActor(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Called from:** [api/domains/links.php](/code/files/api/domains/links.php.md), [api/domains/process.php](/code/files/api/domains/process.php.md), [api/domains/watch.php](/code/files/api/domains/watch.php.md)

### loadAccountForActor

*private static* - line 588

```php
function loadAccountForActor(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 590 | `DomainsService::loadAccountForActor` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

### assertScope

*private static* - line 598

```php
function assertScope(PDO $conn, ActorContext $ctx, array $row): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$row` | `array` |  |  |

### storeTenant

*private static* - line 608

The Default company is stored as NULL, the way every scoped table does.

```php
function storeTenant(PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

### validateField

*private static* - line 618

```php
function validateField(PDO $conn, string $field, $v, array $def, array $row, string $domainName)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |
| `$v` |  |  |  |
| `$def` | `array` |  |  |
| `$row` | `array` |  |  |
| `$domainName` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 634 | `DomainsService::validateField` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

### fieldReady

*private static* - line 709

Is this field's column there yet? The #153 and #162 columns arrive with Database Verification.

```php
function fieldReady(PDO $conn, string $field): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |

### normaliseParties

*private static* - line 725

#162: a domain has ONE customer - a person, or a supplier (optionally with one of its contacts) - and ONE technical contact - a supplier contact, or an analyst. Setting one kind clears the other, so a caller (the edit dialog, or a REST PATCH naming just one field) never has to know which kind was there before. Naming both kinds at once is refused rather than guessed. Clearing a field clears only that field, except that clearing the supplier also clears its contact.

```php
function normaliseParties(PDO $conn, array $in, array $cur): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |
| `$cur` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 747 | `DomainsService::normaliseParties` | read [contacts](/code/tables/contacts.md) |  |
| 762 | `DomainsService::normaliseParties` | read [contacts](/code/tables/contacts.md) |  |

### lookup

*private static* - line 772

```php
function lookup(PDO $conn, string $table, $value, string $label): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$value` |  |  |  |
| `$label` | `string` |  |  |

### requireAnalyst

*private static* - line 782

```php
function requireAnalyst(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 784 | `DomainsService::requireAnalyst` | read [analysts](/code/tables/analysts.md) |  |

### str

*private static* - line 789

```php
function str($v, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

### same

*private static* - line 795

```php
function same($a, $b): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$a` |  |  |  |
| `$b` |  |  |  |

### matchSupplier

*private static* - line 802

A supplier whose legal or trading name matches the registry's registrar name.

```php
function matchSupplier(PDO $conn, string $registrar): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$registrar` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 808 | `DomainsService::matchSupplier` | read [suppliers](/code/tables/suppliers.md) |  |

### audit

*public static* - line 822

```php
function audit(
    PDO $conn,
    int $domainId,
    ?int $analystId,
    string $field,
    $old,
    $new,
    string $source = 'app'
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |
| `$analystId` | `?int` |  |  |
| `$field` | `string` |  |  |
| `$old` |  |  |  |
| `$new` |  |  |  |
| `$source` | `string` | `'app'` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 825 | `DomainsService::audit` | **insert** [domain_audit](/code/tables/domain_audit.md) (`domain_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

**Called from:** [api/domains/watch.php](/code/files/api/domains/watch.php.md), [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### assertContractVisible

*private static* - line 841

A domain may only be linked to a contract its editor can see - one in a company outside their reach is "unknown", as everywhere else - and, since contracts belong to a company (3.5.0), only to one in the DOMAIN's company. `$domainTenant` is the domain's stored company (NULL = Default).

```php
function assertContractVisible(
    PDO $conn,
    ActorContext $ctx,
    $contractId,
    ?int $domainTenant = null
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$contractId` |  |  |  |
| `$domainTenant` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 846 | `DomainsService::assertContractVisible` | read [contracts](/code/tables/contracts.md) |  |

### auditDisplay

*private static* - line 859

Ids stored as names, so the history reads as English a year later.

```php
function auditDisplay(PDO $conn, string $field, $v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |
| `$v` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 863 | `DomainsService::auditDisplay` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 864 | `DomainsService::auditDisplay` | read [suppliers](/code/tables/suppliers.md) |  |
| 865 | `DomainsService::auditDisplay` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |
| 866 | `DomainsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |
| 867 | `DomainsService::auditDisplay` | read [contacts](/code/tables/contacts.md) |  |
| 868 | `DomainsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |
| 869 | `DomainsService::auditDisplay` | read [suppliers](/code/tables/suppliers.md) |  |
| 870 | `DomainsService::auditDisplay` | read [contacts](/code/tables/contacts.md) |  |
| 871 | `DomainsService::auditDisplay` | read [contracts](/code/tables/contracts.md) |  |
| 872 | `DomainsService::auditDisplay` | read [users](/code/tables/users.md) |  |

### eventPayload

*public static* - line 883

The payload every domain.* event carries.

```php
function eventPayload(array $row): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |

### dispatchCrud

*private static* - line 901

```php
function dispatchCrud(PDO $conn, string $verb, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$verb` | `string` |  |  |
| `$id` | `int` |  |  |

### afterDateChange

*private static* - line 912

Expiry dates feed the calendar; keep it in step. Never fails the write.

```php
function afterDateChange(PDO $conn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

