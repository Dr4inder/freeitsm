# AssetImportService

> Class in [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md), line 39

## Methods

| Method | What it does |
|---|---|
| [availableMatchKeys()](#availablematchkeys) | MATCH_KEYS minus anything this install has not got yet. |
| [schemaReady()](#schemaready) |  |
| [readCsv()](#readcsv) | Read a CSV into [headers, rows]. Rows are [header => value]. |
| [dedupeHeaders()](#dedupeheaders) | "Serial", "Serial" -> "Serial", "Serial (2)". |
| [suggestMapping()](#suggestmapping) | Guess a mapping from the column names, so the screen opens mostly done. |
| [run()](#run) | Import rows. `$mode` of 'preview' does every check and writes nothing. |
| [processRow()](#processrow) | One row: map it, find it, write it. |
| [resolveLookups()](#resolvelookups) | Turn the NAMES a spreadsheet contains into the ids the columns hold. |
| [hasTenantColumn()](#hastenantcolumn) | Not every lookup table is company-scoped (suppliers may not be). |
| [applyMapping()](#applymapping) | Split a source row into core columns and custom field values. |
| [findMatch()](#findmatch) | Find the existing asset for this row, trying each match key IN ORDER. |
| [applyCreate()](#applycreate) |  |
| [applyUpdate()](#applyupdate) |  |
| [writeFields()](#writefields) | Write the custom fields, honouring on_unknown_option. |
| [resolveOption()](#resolveoption) | A dropdown value the option list does not have (§6.7). reject -> the row fails; add -> the option is created. |
| [attachProfileSet()](#attachprofileset) | The profile's field set, applied to everything it touches. |
| [handleMissing()](#handlemissing) | Rows present last run and absent now (§6.6). |
| [inactiveStatusId()](#inactivestatusid) |  |
| [unresolved()](#unresolved) | Rows that could not be imported and have not been dealt with. |
| [resolveEntry()](#resolveentry) | Mark a parked row dealt with — either retried successfully, or dismissed. |
| [startRun()](#startrun) |  |
| [finishRun()](#finishrun) |  |
| [loadRun()](#loadrun) |  |
| [runEntries()](#runentries) | Every row's outcome for a run. |
| [logEntry()](#logentry) |  |
| [loadCore()](#loadcore) |  |
| [firstNonEmpty()](#firstnonempty) |  |
| [refOf()](#refof) |  |
| [nameOf()](#nameof) |  |
| [describe()](#describe) | A human sentence describing what a row did, for the log. |
| [short()](#short) |  |

### availableMatchKeys

*public static* - line 85

MATCH_KEYS minus anything this install has not got yet.

`assets.asset_tag` arrives with the QR-label update; naming it on an
install that has pulled the code but not run Verification turns every
single row into "Unknown column" — the same trap the asset list had to
dodge.

```php
function availableMatchKeys(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 92 | `AssetImportService::availableMatchKeys` | read [assets](/code/tables/assets.md) |  |

**Called from:** [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md)

### schemaReady

*public static* - line 104

```php
function schemaReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 109 | `AssetImportService::schemaReady` | read [asset_import_runs](/code/tables/asset_import_runs.md) |  |

**Called from:** [api/assets/import_history.php](/code/files/api/assets/import_history.php.md), [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md)

### readCsv

*public static* - line 130

Read a CSV into [headers, rows]. Rows are [header => value].

⚠️ Strips a UTF-8 BOM. Excel writes one by default, and without this the
first column's header arrives as "\xEF\xBB\xBFHostname" — which maps to
nothing, so the identity column silently goes missing and every row looks
new. It is the single most common reason a first import "does nothing".

```php
function readCsv(string $path, array $config = []): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |
| `$config` | `array` | `[]` |  |

**Called from:** [api/assets/import_run.php](/code/files/api/assets/import_run.php.md), [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md)

### dedupeHeaders

*private static* - line 196

"Serial", "Serial" -> "Serial", "Serial (2)".

```php
function dedupeHeaders(array $headers): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$headers` | `array` |  |  |

### suggestMapping

*public static* - line 218

Guess a mapping from the column names, so the screen opens mostly done.

A suggestion only — every one is shown and overridable. Getting this
wrong silently is exactly what the preview exists to catch.

```php
function suggestMapping(PDO $conn, array $headers, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$headers` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Called from:** [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md)

### run

*public static* - line 285

Import rows. `$mode` of 'preview' does every check and writes nothing.

```php
function run(
    PDO $conn,
    ActorContext $ctx,
    array $rows,
    array $mapping,
    array $opts,
    string $mode = 'preview'
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$rows` | `array` |  |  |
| `$mapping` | `array` |  |  |
| `$opts` | `array` |  | profile-shaped settings; see asset_import_profiles. |
| `$mode` | `string` | `'preview'` |  |

**Returns:** array the run row, with counts.

**Called from:** [api/assets/import_run.php](/code/files/api/assets/import_run.php.md)

### processRow

*private static* - line 388

One row: map it, find it, write it.

```php
function processRow(
    PDO $conn,
    ActorContext $ctx,
    array $row,
    array $mapping,
    array $opts,
    array $matchKeys,
    ?int $tenantId,
    bool $live
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$row` | `array` |  |  |
| `$mapping` | `array` |  |  |
| `$opts` | `array` |  |  |
| `$matchKeys` | `array` |  |  |
| `$tenantId` | `?int` |  |  |
| `$live` | `bool` |  |  |

**Returns:** array ['action', 'asset_id'?, 'source_ref'?, 'display_name'?, 'detail'?]

### resolveLookups

*private static* - line 450

Turn the NAMES a spreadsheet contains into the ids the columns hold.

🔑 Nobody's export has FreeITSM's internal ids in it. Without this, the
single most obvious mapping anybody would make — a "Type" column full of
the words Printer, Monitor, Headset — fails on every row with
"Unknown asset type id: Printer", which reads as a bug rather than as
something the file is missing.

⚠️ An unknown NAME is an error, never an auto-create. Otherwise the first
typo in a spreadsheet quietly invents an asset type called "Televsion"
and nobody notices until the type list is a mess. It goes to the holding
area instead, which is the whole point of having one.

A numeric value is still accepted as an id, so an export from another
FreeITSM keeps working.

```php
function resolveLookups(PDO $conn, array $core, ?int $tenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$core` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

### hasTenantColumn

*private static* - line 510

Not every lookup table is company-scoped (suppliers may not be).

```php
function hasTenantColumn(PDO $conn, string $table): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |

### applyMapping

*private static* - line 525

Split a source row into core columns and custom field values.

```php
function applyMapping(array $row, array $mapping): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |
| `$mapping` | `array` |  |  |

### findMatch

*private static* - line 553

Find the existing asset for this row, trying each match key IN ORDER.

🔑 The first key that yields exactly one match wins. A key that yields
MANY stops the search and reports the conflict — falling through to the
next key would quietly resolve an ambiguity nobody had looked at.

```php
function findMatch(PDO $conn, array $core, array $matchKeys, ?int $tenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$core` | `array` |  |  |
| `$matchKeys` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 563 | `AssetImportService::findMatch` | read [assets](/code/tables/assets.md) |  |

### applyCreate

*private static* - line 574

```php
function applyCreate(
    PDO $conn,
    ActorContext $ctx,
    array $core,
    array $fields,
    array $opts,
    string $ref,
    ?string $name,
    ?int $tenantId,
    bool $live
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$core` | `array` |  |  |
| `$fields` | `array` |  |  |
| `$opts` | `array` |  |  |
| `$ref` | `string` |  |  |
| `$name` | `?string` |  |  |
| `$tenantId` | `?int` |  |  |
| `$live` | `bool` |  |  |

### applyUpdate

*private static* - line 598

```php
function applyUpdate(
    PDO $conn,
    ActorContext $ctx,
    int $assetId,
    array $core,
    array $fields,
    array $opts,
    string $ref,
    ?string $name,
    bool $live
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$assetId` | `int` |  |  |
| `$core` | `array` |  |  |
| `$fields` | `array` |  |  |
| `$opts` | `array` |  |  |
| `$ref` | `string` |  |  |
| `$name` | `?string` |  |  |
| `$live` | `bool` |  |  |

### writeFields

*private static* - line 666

Write the custom fields, honouring on_unknown_option.

A field the asset does not carry is REPORTED, not silently dropped — a
column mapped to a field that the asset's type does not have is a mapping
mistake somebody needs to know about.

```php
function writeFields(PDO $conn, ActorContext $ctx, int $assetId, array $fields, array $opts): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$assetId` | `int` |  |  |
| `$fields` | `array` |  |  |
| `$opts` | `array` |  |  |

### resolveOption

*private static* - line 705

A dropdown value the option list does not have (§6.7). reject -> the row fails; add -> the option is created.

```php
function resolveOption(PDO $conn, array $def, string $value, array $opts): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$def` | `array` |  |  |
| `$value` | `string` |  |  |
| `$opts` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 707 | `AssetImportService::resolveOption` | read [asset_field_options](/code/tables/asset_field_options.md) |  |
| 716 | `AssetImportService::resolveOption` | **insert** [asset_field_options](/code/tables/asset_field_options.md) (`field_id`, `option_value`, `display_order`) |  |

### attachProfileSet

*private static* - line 726

The profile's field set, applied to everything it touches.

```php
function attachProfileSet(PDO $conn, ActorContext $ctx, int $assetId, array $opts): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$assetId` | `int` |  |  |
| `$opts` | `array` |  |  |

### handleMissing

*private static* - line 741

Rows present last run and absent now (§6.6).

⚠️ Only ever compares against assets THIS PROFILE has touched before.
Comparing against the whole estate would deactivate every asset the
spreadsheet was never about.

```php
function handleMissing(
    PDO $conn,
    int $runId,
    int $profileId,
    array $touchedIds,
    string $policy,
    ?int $tenantId
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `int` |  |  |
| `$profileId` | `int` |  |  |
| `$touchedIds` | `array` |  |  |
| `$policy` | `string` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 745 | `AssetImportService::handleMissing` | read [asset_import_run_entries](/code/tables/asset_import_run_entries.md), read [asset_import_runs](/code/tables/asset_import_runs.md) |  |
| 767 | `AssetImportService::handleMissing` | **update** [assets](/code/tables/assets.md) (`asset_status_id`) |  |

### inactiveStatusId

*private static* - line 783

```php
function inactiveStatusId(PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 786 | `AssetImportService::inactiveStatusId` | read [asset_status_types](/code/tables/asset_status_types.md) |  |

### unresolved

*public static* - line 801

Rows that could not be imported and have not been dealt with.

```php
function unresolved(PDO $conn, ?int $runId = null, int $limit = 200): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `?int` | `null` |  |
| `$limit` | `int` | `200` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 806 | `AssetImportService::unresolved` | read [asset_import_run_entries](/code/tables/asset_import_run_entries.md), read [asset_import_runs](/code/tables/asset_import_runs.md) |  |

**Called from:** [api/assets/import_history.php](/code/files/api/assets/import_history.php.md)

### resolveEntry

*public static* - line 829

Mark a parked row dealt with — either retried successfully, or dismissed.

```php
function resolveEntry(PDO $conn, int $entryId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$entryId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 831 | `AssetImportService::resolveEntry` | **update** [asset_import_run_entries](/code/tables/asset_import_run_entries.md) (`resolved_datetime`) |  |

**Called from:** [api/assets/import_resolve.php](/code/files/api/assets/import_resolve.php.md)

### startRun

*private static* - line 839

```php
function startRun(PDO $conn, ActorContext $ctx, array $opts, string $mode, ?int $tenantId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$opts` | `array` |  |  |
| `$mode` | `string` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 847 | `AssetImportService::startRun` | **insert** [asset_import_runs](/code/tables/asset_import_runs.md) (`profile_id`, `mode`, `status`, `source_name`, `stored_file`, `triggered_by_analyst_id`, `tenant_id`, `started_datetime`) |  |

### finishRun

*private static* - line 862

```php
function finishRun(PDO $conn, int $runId, int $seen, array $counts): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `int` |  |  |
| `$seen` | `int` |  |  |
| `$counts` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 865 | `AssetImportService::finishRun` | **update** [asset_import_runs](/code/tables/asset_import_runs.md) (`status`, `finished_datetime`, `seen_count`, `created_count`, `updated_count`, `unchanged_count`, `conflict_count`, `skipped_count`, `error_count`) |  |

### loadRun

*public static* - line 878

```php
function loadRun(PDO $conn, int $runId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 880 | `AssetImportService::loadRun` | read [asset_import_runs](/code/tables/asset_import_runs.md) |  |

**Called from:** [api/assets/import_history.php](/code/files/api/assets/import_history.php.md)

### runEntries

*public static* - line 894

Every row's outcome for a run.

```php
function runEntries(PDO $conn, int $runId, ?string $action = null, int $limit = 500): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `int` |  |  |
| `$action` | `?string` | `null` |  |
| `$limit` | `int` | `500` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 896 | `AssetImportService::runEntries` | read [asset_import_run_entries](/code/tables/asset_import_run_entries.md) |  |

**Called from:** [api/assets/import_history.php](/code/files/api/assets/import_history.php.md), [api/assets/import_run.php](/code/files/api/assets/import_run.php.md)

### logEntry

*private static* - line 908

```php
function logEntry(
    PDO $conn,
    int $runId,
    ?int $rowNo,
    string $action,
    ?int $assetId,
    ?string $ref,
    ?string $name,
    ?string $detail,
    ?array $raw
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `int` |  |  |
| `$rowNo` | `?int` |  |  |
| `$action` | `string` |  |  |
| `$assetId` | `?int` |  |  |
| `$ref` | `?string` |  |  |
| `$name` | `?string` |  |  |
| `$detail` | `?string` |  |  |
| `$raw` | `?array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 917 | `AssetImportService::logEntry` | **insert** [asset_import_run_entries](/code/tables/asset_import_run_entries.md) (`run_id`, `row_number`, `action`, `asset_id`, `source_ref`, `display_name`, `detail`, `raw_row`) |  |

### loadCore

*private static* - line 937

```php
function loadCore(PDO $conn, int $assetId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$assetId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 940 | `AssetImportService::loadCore` | read [assets](/code/tables/assets.md) |  |

### firstNonEmpty

*private static* - line 945

```php
function firstNonEmpty(array $core, array $keys): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$core` | `array` |  |  |
| `$keys` | `array` |  |  |

### refOf

*private static* - line 955

```php
function refOf(array $row, array $mapping, array $matchKeys): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |
| `$mapping` | `array` |  |  |
| `$matchKeys` | `array` |  |  |

### nameOf

*private static* - line 961

```php
function nameOf(array $row, array $mapping): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |
| `$mapping` | `array` |  |  |

### describe

*private static* - line 968

A human sentence describing what a row did, for the log.

```php
function describe(array $core, array $fields): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$core` | `array` |  |  |
| `$fields` | `array` |  |  |

### short

*private static* - line 988

```php
function short($v): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

