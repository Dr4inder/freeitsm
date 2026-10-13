# CostCentresService

> Class in [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md), line 42

## Methods

| Method | What it does |
|---|---|
| [ready()](#ready) | Has Database Verification created the table yet? |
| [companiesFor()](#companiesfor) | The companies this caller may manage cost centres for: [[id, name, is_default], ...]. |
| [canReach()](#canreach) | True when the actor may reach the company. |
| [assertCompany()](#assertcompany) | The company exists and this caller may use it - or a ServiceError. |
| [listForCompany()](#listforcompany) | Every cost centre of one company, active and inactive, ordered by code, each with its parent's code and how many children it has. |
| [load()](#load) | One cost centre, or not_found (also when it is in a company the caller cannot reach). |
| [create()](#create) | Add one. `$in`: code, name (required); description, parent_id OR parent_code, is_active (optional). |
| [update()](#update) | Change one. Only the keys present in `$in` are touched (PATCH semantics). |
| [delete()](#delete) | Delete one - refused while anything sits below it. Make it inactive instead. |
| [sync()](#sync) | Bring a company's list into line with an incoming one, matched on CODE. |
| [cleanCode()](#cleancode) | Trimmed, never otherwise changed: "0010" stays "0010". |
| [cleanName()](#cleanname) | A cost centre name with control characters removed; throws when blank or too long. |
| [cleanDescription()](#cleandescription) | A cost centre description with control characters removed, or null when blank; throws when too long. |
| [cleanBool()](#cleanbool) | true/false, 1/0, yes/no, y/n, active/inactive - what a spreadsheet or an ERP export says. |
| [codeTaken()](#codetaken) | Throws the "code already used" conflict. |
| [assertCodeFree()](#assertcodefree) | Throws when another cost centre in the company has the same code, ignoring case. |
| [resolveParentInput()](#resolveparentinput) | parent_id or parent_code from the input -> a parent id or null, checked: same company, not itself, not below itself. |

### ready

*public static* - line 49

Has Database Verification created the table yet?

```php
function ready(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 52 | `CostCentresService::ready` | read [cost_centres](/code/tables/cost_centres.md) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md)

### companiesFor

*public static* - line 60

The companies this caller may manage cost centres for: [[id, name, is_default], ...].

```php
function companiesFor(PDO $conn, ActorContext $actor): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md)

### canReach

*private static* - line 74

True when the actor may reach the company.

```php
function canReach(ActorContext $actor, int $tenantId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$actor` | `ActorContext` |  |  |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

### assertCompany

*public static* - line 80

The company exists and this caller may use it - or a ServiceError.

```php
function assertCompany(PDO $conn, ActorContext $actor, int $tenantId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

### listForCompany

*public static* - line 95

Every cost centre of one company, active and inactive, ordered by code, each with its parent's code and how many children it has.

```php
function listForCompany(PDO $conn, ActorContext $actor, int $tenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 99 | `CostCentresService::listForCompany` | read [cost_centres](/code/tables/cost_centres.md) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md)

### load

*public static* - line 111

One cost centre, or not_found (also when it is in a company the caller cannot reach).

```php
function load(PDO $conn, ActorContext $actor, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 114 | `CostCentresService::load` | read [cost_centres](/code/tables/cost_centres.md), read [tenants](/code/tables/tenants.md) |  |

### create

*public static* - line 137

Add one. `$in`: code, name (required); description, parent_id OR parent_code, is_active (optional).

```php
function create(PDO $conn, ActorContext $actor, int $tenantId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 147 | `CostCentresService::create` | **insert** [cost_centres](/code/tables/cost_centres.md) (`tenant_id`, `code`, `name`, `description`, `parent_id`, `is_active`) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md)

### update

*public static* - line 158

Change one. Only the keys present in `$in` are touched (PATCH semantics).

```php
function update(PDO $conn, ActorContext $actor, int $id, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 177 | `CostCentresService::update` | **update** [cost_centres](/code/tables/cost_centres.md) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md)

### delete

*public static* - line 187

Delete one - refused while anything sits below it. Make it inactive instead.

```php
function delete(PDO $conn, ActorContext $actor, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 204 | `CostCentresService::delete` | **delete** [cost_centres](/code/tables/cost_centres.md) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md)

### sync

*public static* - line 231

Bring a company's list into line with an incoming one, matched on CODE.

`$rows`: [['line' => n, 'code' => ..., 'name' => ..., 'description' => ...,
         'parent_code' => ..., 'is_active' => bool|string], ...]
A key that is ABSENT means "leave that field as it is" - so an API caller
can send only codes and names. A key present but empty means empty:
parent_code '' = top level, description '' = none.

`$opts`: dry_run (bool)            work it all out, write nothing
       deactivate_missing (bool) make active cost centres that are NOT in
                                 `$rows` inactive - for a full list from the
                                 finance system. Never deletes.

🔑 ALL OR NOTHING. If any row has a problem, nothing is written and every
problem is reported, with its line. A half-applied nightly sync is worse
than none: the next one cannot tell what the last one did.

```php
function sync(PDO $conn, ActorContext $actor, int $tenantId, array $rows, array $opts = []): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$actor` | `ActorContext` |  |  |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$rows` | `array` |  |  |
| `$opts` | `array` | `[]` |  |

**Returns:** array{applied: bool, dry_run: bool, counts: array, errors: array, rows: array}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 363 | `CostCentresService::sync` | **insert** [cost_centres](/code/tables/cost_centres.md) (`tenant_id`, `code`, `name`, `description`, `is_active`) |  |
| 371 | `CostCentresService::sync` | **update** [cost_centres](/code/tables/cost_centres.md) |  |
| 378 | `CostCentresService::sync` | **update** [cost_centres](/code/tables/cost_centres.md) (`parent_id`) |  |
| 385 | `CostCentresService::sync` | **update** [cost_centres](/code/tables/cost_centres.md) (`is_active`) |  |

**Called from:** [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md), [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md)

### cleanCode

*public static* - line 402

Trimmed, never otherwise changed: "0010" stays "0010".

```php
function cleanCode($v): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### cleanName

*private static* - line 412

A cost centre name with control characters removed; throws when blank or too long.

```php
function cleanName($v): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### cleanDescription

*private static* - line 421

A cost centre description with control characters removed, or null when blank; throws when too long.

```php
function cleanDescription($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### cleanBool

*public static* - line 430

true/false, 1/0, yes/no, y/n, active/inactive - what a spreadsheet or an ERP export says.

```php
function cleanBool($v, string $field): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$field` | `string` |  |  |

### codeTaken

*private static* - line 442

Throws the "code already used" conflict.

```php
function codeTaken(string $code): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$code` | `string` |  |  |

### assertCodeFree

*private static* - line 448

Throws when another cost centre in the company has the same code, ignoring case.

```php
function assertCodeFree(PDO $conn, int $tenantId, string $code, ?int $exceptId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$code` | `string` |  |  |
| `$exceptId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 451 | `CostCentresService::assertCodeFree` | read [cost_centres](/code/tables/cost_centres.md) |  |

### resolveParentInput

*private static* - line 460

parent_id or parent_code from the input -> a parent id or null, checked: same company, not itself, not below itself.

```php
function resolveParentInput(PDO $conn, int $tenantId, array $in, ?int $selfId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |
| `$selfId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 466 | `CostCentresService::resolveParentInput` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 471 | `CostCentresService::resolveParentInput` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 484 | `CostCentresService::resolveParentInput` | read [cost_centres](/code/tables/cost_centres.md) |  |

