# SoftwareService

> Class in [includes/services/software.php](/code/files/includes/services/software.php.md), line 31

## Methods

| Method | What it does |
|---|---|
| [saveLicence()](#savelicence) | Create (no id) or update (id present) a licence. Returns ['id' => int, 'created' => bool]. |
| [deleteLicence()](#deletelicence) | Delete a licence (leaf table). Returns the id. 404 if it does not exist. |
| [resyncRenewalCalendar()](#resyncrenewalcalendar) | Push renewal dates back into the calendar after any licence write (#1551). |
| [loadLicenceRow()](#loadlicencerow) | Load a licence row for update/delete, or throw 404. |
| [collectFields()](#collectfields) | Collect + validate the writable licence fields (mirrors the API resource's apiSoftwareLicenceFields coercions). On update, absent keys fall back to the current row; on create they fall back to the column default. |
| [parseDateOnly()](#parsedateonly) | Validate an optional YYYY-MM-DD date (throwing version of apiParseDateOnly). |

### saveLicence

*public static* - line 37

Create (no id) or update (id present) a licence. Returns ['id' => int, 'created' => bool].

```php
function saveLicence(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `SoftwareService::saveLicence` | **update** [software_licences](/code/tables/software_licences.md) (`app_id`, `licence_type`, `licence_key`, `quantity`, `renewal_date`, `notice_period_days`, `portal_url`, `cost`, `currency`, `purchase_date`, `vendor_contact`, `notes`) |  |
| 64 | `SoftwareService::saveLicence` | **insert** [software_licences](/code/tables/software_licences.md) (`app_id`, `licence_type`, `licence_key`, `quantity`, `renewal_date`, `notice_period_days`, `portal_url`, `cost`, `currency`, `purchase_date`, `vendor_contact`, `notes`) |  |

**Called from:** [api/software/save_licence.php](/code/files/api/software/save_licence.php.md), [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md)

### deleteLicence

*public static* - line 81

Delete a licence (leaf table). Returns the id. 404 if it does not exist.

```php
function deleteLicence(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 84 | `SoftwareService::deleteLicence` | **delete** [software_licences](/code/tables/software_licences.md) |  |

**Called from:** [api/software/delete_licence.php](/code/files/api/software/delete_licence.php.md), [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md)

### resyncRenewalCalendar

*private static* - line 107

Push renewal dates back into the calendar after any licence write (#1551).

⚠️ NEVER ALLOWED TO FAIL THE WRITE. The licence is the record; its calendar
entries are a convenience derived from it. A calendar table that is missing,
mid-migration or momentarily locked must not turn "save this licence" into
an error — the licence is already committed by the time this runs, so
throwing here would report a failure for something that succeeded.

A cheap full resync, exactly as the asset warranty generator does it:
licence edits are rare and the event set is small, and regenerating the lot
is the only version with no drift in it.

```php
function resyncRenewalCalendar(PDO $conn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### loadLicenceRow

*private static* - line 119

Load a licence row for update/delete, or throw 404.

```php
function loadLicenceRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 121 | `SoftwareService::loadLicenceRow` | read [software_licences](/code/tables/software_licences.md) |  |

### collectFields

*private static* - line 135

Collect + validate the writable licence fields (mirrors the API resource's apiSoftwareLicenceFields coercions). On update, absent keys fall back to the current row; on create they fall back to the column default.

```php
function collectFields(PDO $conn, array $in, array $current = []): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |
| `$current` | `array` | `[]` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 146 | `SoftwareService::collectFields` | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

### parseDateOnly

*private static* - line 190

Validate an optional YYYY-MM-DD date (throwing version of apiParseDateOnly).

```php
function parseDateOnly($value, string $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

