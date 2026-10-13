# DomainsService

> Class in [includes/services/domains.php](/code/files/includes/services/domains.php.md), line 43

## Methods

| Method | What it does |
|---|---|
| [fieldMap()](#fieldmap) | The fields a person (or an API key) may set, and how each is validated. domain_name and auth_code are handled separately. |
| [bulkFields()](#bulkfields) | Fields the bulk editor may set on many domains at once. |
| [saveDomain()](#savedomain) | Create (no id) or update (id present) a domain. Returns ['id', 'created']. |
| [createDomain()](#createdomain) | Adds a domain to the register for a company and returns its id. |
| [updateDomain()](#updatedomain) | Changes a domain's fields, records each change in its history and fires domain.updated when anything changed. |
| [deleteDomain()](#deletedomain) | Delete a domain and everything that hangs off it. Returns the id. |
| [bulkAdd()](#bulkadd) | Add many domains from a pasted list (one per line, or separated by commas or spaces). Every name goes through the same create path as a single add. |
| [bulkUpdate()](#bulkupdate) | Set the same fields on many domains. Each goes through `updateDomain()`, so each gets its own history rows and scope check; a domain the caller cannot reach is reported, not silently skipped. |
| [refreshLookup()](#refreshlookup) | Look a domain up now and apply the answer. For the "Refresh" button and the API. |
| [applyLookup()](#applylookup) | Write a lookup result onto a domain, under the operator's overwrite rule. |
| [recordLookupError()](#recordlookuperror) | Records that the last registration lookup for a domain failed, and why. |
| [runChecks()](#runchecks) | Run the health/security checks for one domain, store the result, and compare against the last run. Returns the check result plus 'changes'. |
| [revealAuthCode()](#revealauthcode) | The decrypted auth code, for somebody the adapter has already checked holds Cap::DOMAINS_AUTH_CODES. Recorded in the domain's history unless the operator switched that off. |
| [saveStatus()](#savestatus) | Adds or updates a domain status (name, colour, alerts on or off, active, order); names must be unique. |
| [deleteStatus()](#deletestatus) | Deletes a domain status; refuses while any domain uses it. |
| [saveRegistrarAccount()](#saveregistraraccount) | Adds or updates a registrar account (the login at a registrar) for a company. |
| [deleteRegistrarAccount()](#deleteregistraraccount) | Deletes a registrar account, unlinking it from its domains first. |
| [loadRow()](#loadrow) | Loads one domain; throws not found when it does not exist. |
| [loadForActor()](#loadforactor) | Load a domain the caller may touch — out of scope reads as not found. |
| [loadAccountForActor()](#loadaccountforactor) | Loads a registrar account the actor's companies can reach; throws not found otherwise. |
| [assertScope()](#assertscope) | Throws not found when the row's company is outside the actor's companies. |
| [storeTenant()](#storetenant) | The Default company is stored as NULL, the way every scoped table does. |
| [validateField()](#validatefield) | Validates and cleans one domain field according to its type in `fieldMap()`, and returns the value to store. |
| [fieldReady()](#fieldready) | Is this field's column there yet? The #153 and #162 columns arrive with Database Verification. |
| [normaliseParties()](#normaliseparties) | #162: a domain has ONE customer - a person, or a supplier (optionally with one of its contacts) - and ONE technical contact - a supplier contact, or an analyst. Setting one kind clears the other, so a caller (the edit dialog, or a REST PATCH naming just one field) never has to know which kind was there before. Naming both kinds at once is refused rather than guessed. Clearing a field clears only that field, except that clearing the supplier also clears its contact. |
| [lookup()](#lookup) | A validated id from a lookup table, or null for none; throws for an unknown id. |
| [requireAnalyst()](#requireanalyst) | Throws unless the id is an active analyst. |
| [str()](#str) | Trimmed text cut to `$max` characters, or null when blank. |
| [same()](#same) | True when two values are equal, treating null and '' as the same. |
| [matchSupplier()](#matchsupplier) | A supplier whose legal or trading name matches the registry's registrar name. |
| [audit()](#audit) | Records one change in a domain's history; a failure is logged, never thrown. |
| [assertContractVisible()](#assertcontractvisible) | A domain may only be linked to a contract its editor can see - one in a company outside their reach is "unknown", as everywhere else - and, since contracts belong to a company (3.5.0), only to one in the DOMAIN's company. `$domainTenant` is the domain's stored company (NULL = Default). |
| [auditDisplay()](#auditdisplay) | Ids stored as names, so the history reads as English a year later. |
| [eventPayload()](#eventpayload) | The payload every domain.* event carries. |
| [dispatchCrud()](#dispatchcrud) | Fires the domain.<verb> workflow event for a domain; a failure is logged, never thrown. |
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

*public static* - line 120

Adds a domain to the register for a company and returns its id.

Validates every field, starts it in the first active status, encrypts any auth code,
records it in the history and fires the domain.created workflow event.

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
| 133 | `DomainsService::createDomain` | read [domains](/code/tables/domains.md) |  |
| 153 | `DomainsService::createDomain` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 157 | `DomainsService::createDomain` | **insert** [domains](/code/tables/domains.md) |  |
| 162 | `DomainsService::createDomain` | **update** [domains](/code/tables/domains.md) (`auth_code`) |  |

**Called from:** [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### updateDomain

*public static* - line 177

Changes a domain's fields, records each change in its history and fires domain.updated when anything changed.

A new domain name clears the change-watch baseline.

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
| 190 | `DomainsService::updateDomain` | read [domains](/code/tables/domains.md) |  |
| 222 | `DomainsService::updateDomain` | **update** [domains](/code/tables/domains.md) |  |

**Called from:** [api/domains/auth_code.php](/code/files/api/domains/auth_code.php.md), [api/domains/links.php](/code/files/api/domains/links.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### deleteDomain

*public static* - line 233

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
| 249 | `DomainsService::deleteDomain` | **delete** [domains](/code/tables/domains.md) |  |

**Called from:** [api/domains/delete.php](/code/files/api/domains/delete.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md)

### bulkAdd

*public static* - line 270

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

*public static* - line 299

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

*public static* - line 317

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

*public static* - line 342

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
| 397 | `DomainsService::applyLookup` | **update** [domains](/code/tables/domains.md) |  |

**Called from:** [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### recordLookupError

*public static* - line 407

Records that the last registration lookup for a domain failed, and why.

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
| 409 | `DomainsService::recordLookupError` | **update** [domains](/code/tables/domains.md) (`last_lookup_datetime`, `last_lookup_error`) |  |

**Called from:** [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### runChecks

*public static* - line 423

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
| 434 | `DomainsService::runChecks` | **update** [domains](/code/tables/domains.md) (`check_results`, `security_score`, `security_grade`, `ssl_expiry_date`, `ssl_issuer`, `watch_baseline`, `last_check_datetime`) |  |

**Called from:** [api/domains/process.php](/code/files/api/domains/process.php.md), [api/domains/save.php](/code/files/api/domains/save.php.md), [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### revealAuthCode

*public static* - line 490

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

*public static* - line 509

Adds or updates a domain status (name, colour, alerts on or off, active, order); names must be unique.

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
| 519 | `DomainsService::saveStatus` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 524 | `DomainsService::saveStatus` | **update** [domain_statuses](/code/tables/domain_statuses.md) (`name`, `colour`, `alerts_enabled`, `is_active`, `display_order`) |  |
| 528 | `DomainsService::saveStatus` | **insert** [domain_statuses](/code/tables/domain_statuses.md) (`name`, `colour`, `alerts_enabled`, `is_active`, `display_order`, `created_datetime`) |  |

**Called from:** [api/domains/statuses.php](/code/files/api/domains/statuses.php.md)

### deleteStatus

*public static* - line 534

Deletes a domain status; refuses while any domain uses it.

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
| 536 | `DomainsService::deleteStatus` | read [domains](/code/tables/domains.md) |  |
| 541 | `DomainsService::deleteStatus` | **delete** [domain_statuses](/code/tables/domain_statuses.md) |  |

**Called from:** [api/domains/statuses.php](/code/files/api/domains/statuses.php.md)

### saveRegistrarAccount

*public static* - line 549

Adds or updates a registrar account (the login at a registrar) for a company.

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
| 565 | `DomainsService::saveRegistrarAccount` | **update** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) (`supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes`) |  |
| 573 | `DomainsService::saveRegistrarAccount` | **insert** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) (`supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes`, `tenant_id`, `created_by`, `created_datetime`) |  |

**Called from:** [api/domains/accounts.php](/code/files/api/domains/accounts.php.md)

### deleteRegistrarAccount

*public static* - line 580

Deletes a registrar account, unlinking it from its domains first.

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
| 583 | `DomainsService::deleteRegistrarAccount` | **update** [domains](/code/tables/domains.md) (`registrar_account_id`) |  |
| 584 | `DomainsService::deleteRegistrarAccount` | **delete** [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

**Called from:** [api/domains/accounts.php](/code/files/api/domains/accounts.php.md)

### loadRow

*public static* - line 592

Loads one domain; throws not found when it does not exist.

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
| 594 | `DomainsService::loadRow` | read [domains](/code/tables/domains.md) |  |

### loadForActor

*public static* - line 602

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

*private static* - line 610

Loads a registrar account the actor's companies can reach; throws not found otherwise.

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
| 612 | `DomainsService::loadAccountForActor` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

### assertScope

*private static* - line 621

Throws not found when the row's company is outside the actor's companies.

```php
function assertScope(PDO $conn, ActorContext $ctx, array $row): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$row` | `array` |  |  |

### storeTenant

*private static* - line 631

The Default company is stored as NULL, the way every scoped table does.

```php
function storeTenant(PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

### validateField

*private static* - line 645

Validates and cleans one domain field according to its type in `fieldMap()`, and returns the value to store.

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
| 661 | `DomainsService::validateField` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |

### fieldReady

*private static* - line 736

Is this field's column there yet? The #153 and #162 columns arrive with Database Verification.

```php
function fieldReady(PDO $conn, string $field): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |

### normaliseParties

*private static* - line 752

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
| 774 | `DomainsService::normaliseParties` | read [contacts](/code/tables/contacts.md) |  |
| 789 | `DomainsService::normaliseParties` | read [contacts](/code/tables/contacts.md) |  |

### lookup

*private static* - line 800

A validated id from a lookup table, or null for none; throws for an unknown id.

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

*private static* - line 811

Throws unless the id is an active analyst.

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
| 813 | `DomainsService::requireAnalyst` | read [analysts](/code/tables/analysts.md) |  |

### str

*private static* - line 819

Trimmed text cut to `$max` characters, or null when blank.

```php
function str($v, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

### same

*private static* - line 826

True when two values are equal, treating null and '' as the same.

```php
function same($a, $b): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$a` |  |  |  |
| `$b` |  |  |  |

### matchSupplier

*private static* - line 833

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
| 839 | `DomainsService::matchSupplier` | read [suppliers](/code/tables/suppliers.md) |  |

### audit

*public static* - line 858

Records one change in a domain's history; a failure is logged, never thrown.

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

**Writes:** domain_audit - the domain's change history

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 861 | `DomainsService::audit` | **insert** [domain_audit](/code/tables/domain_audit.md) (`domain_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

**Called from:** [api/domains/watch.php](/code/files/api/domains/watch.php.md), [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md)

### assertContractVisible

*private static* - line 877

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
| 882 | `DomainsService::assertContractVisible` | read [contracts](/code/tables/contracts.md) |  |

### auditDisplay

*private static* - line 895

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
| 899 | `DomainsService::auditDisplay` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 900 | `DomainsService::auditDisplay` | read [suppliers](/code/tables/suppliers.md) |  |
| 901 | `DomainsService::auditDisplay` | read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md) |  |
| 902 | `DomainsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |
| 903 | `DomainsService::auditDisplay` | read [contacts](/code/tables/contacts.md) |  |
| 904 | `DomainsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |
| 905 | `DomainsService::auditDisplay` | read [suppliers](/code/tables/suppliers.md) |  |
| 906 | `DomainsService::auditDisplay` | read [contacts](/code/tables/contacts.md) |  |
| 907 | `DomainsService::auditDisplay` | read [contracts](/code/tables/contracts.md) |  |
| 908 | `DomainsService::auditDisplay` | read [users](/code/tables/users.md) |  |

### eventPayload

*public static* - line 919

The payload every domain.* event carries.

```php
function eventPayload(array $row): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |

### dispatchCrud

*private static* - line 938

Fires the domain.<verb> workflow event for a domain; a failure is logged, never thrown.

```php
function dispatchCrud(PDO $conn, string $verb, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$verb` | `string` |  |  |
| `$id` | `int` |  |  |

### afterDateChange

*private static* - line 949

Expiry dates feed the calendar; keep it in step. Never fails the write.

```php
function afterDateChange(PDO $conn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

