# AssetFieldsService

> Class in [includes/services/asset_fields.php](/code/files/includes/services/asset_fields.php.md), line 33

## Methods

| Method | What it does |
|---|---|
| [valueSchema()](#valueschema) | Where asset field values live, for TypedFields. |
| [schemaReady()](#schemaready) | Has Database Verification created the tables yet? |
| [setsForAsset()](#setsforasset) | The sets that apply to an asset: those attached to its TYPE, plus those attached to the asset itself. |
| [fieldsForAsset()](#fieldsforasset) | Canonical TypedFields definitions for an asset, keyed by field_key. |
| [fieldsForSets()](#fieldsforsets) | Canonical definitions for a list of set ids, keyed by field_key. |
| [toDef()](#todef) | One catalogue row (joined to its set membership) -> a canonical definition. |
| [valuesForAsset()](#valuesforasset) | Values for ONE asset, as [field_key => value]. Convenience over the batched reader — for a LIST, call `readForAssets()` once instead. |
| [readForAssets()](#readforassets) | Values for many assets in one query: [assetId => [field_key => value]]. |
| [saveValues()](#savevalues) | Validate + store values for one asset. |
| [assertUnique()](#assertunique) | Enforce `is_unique` across the estate. |
| [logChanges()](#logchanges) | One asset_history row per changed field. |
| [historyText()](#historytext) | A value as it should read in the history table. NULL stays NULL — "not set". |
| [attachSetToAsset()](#attachsettoasset) | Attach a set to ONE asset. Idempotent. |
| [detachSetFromAsset()](#detachsetfromasset) | Detach a set from one asset. |
| [saveField()](#savefield) | Create or update a field in the catalogue. |
| [deleteField()](#deletefield) | Retire a field. SOFT delete, always. |
| [saveSet()](#saveset) | Create or update a field set. |
| [deleteSet()](#deleteset) | Retire a set. Soft delete, and its attachments go with it. |
| [setSetFields()](#setsetfields) | Replace the field list of a set. |
| [setTypeSets()](#settypesets) | Replace which sets are attached to an asset type. |
| [assertType()](#asserttype) | Validates a custom field type; a link field must also name a valid ref_kind. |
| [makeKey()](#makekey) | A stable machine key from a label: lowercase, underscores, no leading digit. |
| [assertKeyFree()](#assertkeyfree) | ⚠️ Application-level uniqueness, because the UNIQUE index cannot do it: MySQL treats NULLs as distinct, so two GLOBAL fields could both claim `serial_number` while the index looked like it was guarding them. Exactly the trap documented on assets.asset_tag. |
| [configTenantForCreate()](#configtenantforcreate) | Which company a new catalogue row belongs to. NULL = a global default. |
| [saveOptions()](#saveoptions) | Replaces a dropdown field's option list, skipping blanks and duplicates; a field that is not a dropdown loses its options. |
| [fieldHasValues()](#fieldhasvalues) | True when any asset has a value stored for the field. |
| [loadField()](#loadfield) | Loads one custom field that has not been deleted; throws not found otherwise. |
| [nullIfBlank()](#nullifblank) | Trimmed text, or null when blank. |
| [catalogue()](#catalogue) | Every field in the catalogue visible to this company (global + own). |
| [sets()](#sets) | Every field set visible to this company (global + own). |
| [loadAsset()](#loadasset) | Loads an asset's id, type and company; throws not found when it does not exist. |
| [loadSet()](#loadset) | Loads one field set that has not been deleted; throws not found otherwise. |
| [tenantOfAsset()](#tenantofasset) | The company id of an asset, or null. |

### valueSchema

*public static* - line 53

Where asset field values live, for TypedFields.

`self_kind` = 'asset', so the no-self-reference rule fires for an asset
pointing at itself and NOT for one whose linked person happens to share
its id — which is exactly the bug a bare `$refId === `$ownerId`` test would
have introduced the first time a `user` field was added.

```php
function valueSchema(): array
```

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 69 | `AssetFieldsService::valueSchema` | read [asset_field_options](/code/tables/asset_field_options.md) |  |

### schemaReady

*public static* - line 79

Has Database Verification created the tables yet?

```php
function schemaReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 84 | `AssetFieldsService::schemaReady` | read [asset_field_values](/code/tables/asset_field_values.md) |  |

**Called from:** [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md), [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md), [api/assets/get_asset_fields.php](/code/files/api/assets/get_asset_fields.php.md), [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), [asset-management/table.php](/code/files/asset-management/table.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md)

### setsForAsset

*public static* - line 108

The sets that apply to an asset: those attached to its TYPE, plus those attached to the asset itself.

🔑 The per-asset half is the pilot case. Ten televisions, three trialled
as smart TVs: the other seven do not show empty IP / MAC / Netflix fields,
they do not have those fields at all.

```php
function setsForAsset(PDO $conn, int $assetId, ?int $assetTypeId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$assetTypeId` | `?int` |  |  |

**Returns:** array Sets in display order, each with `via` = 'type' | 'asset'. A set attached BOTH ways appears once, marked 'type'.

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 118 | `AssetFieldsService::setsForAsset` | read [asset_type_field_sets](/code/tables/asset_type_field_sets.md), read [asset_field_sets](/code/tables/asset_field_sets.md) |  |
| 132 | `AssetFieldsService::setsForAsset` | read [asset_field_set_assets](/code/tables/asset_field_set_assets.md), read [asset_field_sets](/code/tables/asset_field_sets.md) |  |

**Called from:** [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md)

### fieldsForAsset

*public static* - line 159

Canonical TypedFields definitions for an asset, keyed by field_key.

A field in two attached sets appears ONCE. Where the two disagree on
whether it is required, required wins — the stricter reading is the safe
one, and a field that is mandatory for laptops should not become optional
because a second set also happens to include it.

```php
function fieldsForAsset(PDO $conn, int $assetId, ?int $assetTypeId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$assetTypeId` | `?int` |  |  |

**Called from:** [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md), [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md)

### fieldsForSets

*public static* - line 169

Canonical definitions for a list of set ids, keyed by field_key.

```php
function fieldsForSets(PDO $conn, array $setIds): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$setIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 177 | `AssetFieldsService::fieldsForSets` | read [asset_field_set_fields](/code/tables/asset_field_set_fields.md), read [asset_fields](/code/tables/asset_fields.md), read [asset_field_sets](/code/tables/asset_field_sets.md) |  |

**Called from:** [includes/services/assets.php](/code/files/includes/services/assets.php.md)

### toDef

*private static* - line 204

One catalogue row (joined to its set membership) -> a canonical definition.

```php
function toDef(array $r): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

### valuesForAsset

*public static* - line 243

Values for ONE asset, as [field_key => value]. Convenience over the batched reader — for a LIST, call `readForAssets()` once instead.

```php
function valuesForAsset(PDO $conn, int $assetId, array $defs): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$defs` | `array` |  |  |

**Called from:** [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md), [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md)

### readForAssets

*public static* - line 256

Values for many assets in one query: [assetId => [field_key => value]].

⚠️ `$defs` must cover every field any of these assets could hold — pass the
whole visible catalogue, not one asset's fields, or values belonging to a
field outside the list are silently dropped.

```php
function readForAssets(PDO $conn, array $assetIds, array $defs): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetIds` | `array` |  |  |
| `$defs` | `array` |  |  |

**Called from:** [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md)

### saveValues

*public static* - line 276

Validate + store values for one asset.

Only fields that actually apply to this asset may be written — a caller
cannot smuggle in a field from a set the asset does not have. Unknown or
inapplicable keys are a 422, never a silent drop, because a mapping
mistake in an import must be visible.

History is written per changed field so a custom field is as auditable as
a built-in one; an estate where core edits are logged and custom ones
vanish is worse than no audit at all.

```php
function saveValues(PDO $conn, ActorContext $ctx, int $assetId, array $values): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$values` | `array` |  |  |

**Called from:** [api/assets/save_asset_custom_fields.php](/code/files/api/assets/save_asset_custom_fields.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md)

### assertUnique

*private static* - line 325

Enforce `is_unique` across the estate.

⚠️ Scoped to the asset's OWN company. Two customers may each legitimately
hold a printer with asset tag PR0001 — the same reasoning that keeps
hostname uniqueness per company in application code rather than in an
index.

```php
function assertUnique(PDO $conn, int $assetId, array $defs, array $values): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$defs` | `array` |  |  |
| `$values` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 343 | `AssetFieldsService::assertUnique` | read [asset_field_values](/code/tables/asset_field_values.md), read [assets](/code/tables/assets.md) |  |

### logChanges

*private static* - line 371

One asset_history row per changed field.

field_name is stored as `field:<field_key>` — the column is VARCHAR(100)
and the key is the stable identifier, so history stays readable after a
label is renamed.

```php
function logChanges(
    PDO $conn,
    ActorContext $ctx,
    int $assetId,
    array $defs,
    array $before,
    array $after
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$defs` | `array` |  |  |
| `$before` | `array` |  |  |
| `$after` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 378 | `AssetFieldsService::logChanges` | **insert** [asset_history](/code/tables/asset_history.md) (`asset_id`, `analyst_id`, `field_name`, `old_value`, `new_value`) |  |

### historyText

*private static* - line 395

A value as it should read in the history table. NULL stays NULL — "not set".

```php
function historyText($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### attachSetToAsset

*public static* - line 411

Attach a set to ONE asset. Idempotent.

```php
function attachSetToAsset(PDO $conn, ActorContext $ctx, int $assetId, int $setId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$setId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 416 | `AssetFieldsService::attachSetToAsset` | **insert** [asset_field_set_assets](/code/tables/asset_field_set_assets.md) (`asset_id`, `set_id`, `created_by_analyst_id`) |  |

**Called from:** [api/assets/set_asset_field_set.php](/code/files/api/assets/set_asset_field_set.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md)

### detachSetFromAsset

*public static* - line 432

Detach a set from one asset.

⚠️ The VALUES ARE KEPT. Un-ticking "Smart TV pilot" hides the fields; it
does not throw away the IP address someone recorded. Re-attach and it is
all still there. Deleting on detach would make an accidental click
unrecoverable, and the rows are harmless — `readValues()` only returns
values for fields that currently apply.

```php
function detachSetFromAsset(PDO $conn, int $assetId, int $setId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$setId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 434 | `AssetFieldsService::detachSetFromAsset` | **delete** [asset_field_set_assets](/code/tables/asset_field_set_assets.md) |  |

**Called from:** [api/assets/set_asset_field_set.php](/code/files/api/assets/set_asset_field_set.php.md)

### saveField

*public static* - line 455

Create or update a field in the catalogue.

⚠️ `field_key` is IMMUTABLE once the row exists. Import mappings and saved
reports point at it, so renaming the label from "Size" to "Screen size"
must not break a nightly import. The label is freely renameable; the key
is not.

⚠️ `field_type` is immutable once VALUES exist, for the same reason
FormsService fixed it: changing it strands every answer under a column the
new type never reads. Presentational variants are modes inside `config`
(multiline, decimals, date_mode), which stay editable forever.

```php
function saveField(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 484 | `AssetFieldsService::saveField` | **update** [asset_fields](/code/tables/asset_fields.md) (`label`, `field_type`, `config`, `help_text`, `is_unique`, `is_searchable`, `show_in_list`) |  |
| 508 | `AssetFieldsService::saveField` | **insert** [asset_fields](/code/tables/asset_fields.md) (`field_key`, `label`, `field_type`, `config`, `help_text`, `is_unique`, `is_searchable`, `show_in_list`, `tenant_id`) |  |

**Called from:** [api/assets/save_asset_field.php](/code/files/api/assets/save_asset_field.php.md)

### deleteField

*public static* - line 533

Retire a field. SOFT delete, always.

🔑 The row stays because asset_field_values points at it. A hard delete
would take every answer ever recorded with it, and the foreign key is
deliberately RESTRICT so that mistake is impossible even from the
database side.

```php
function deleteField(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 536 | `AssetFieldsService::deleteField` | **update** [asset_fields](/code/tables/asset_fields.md) (`is_deleted`) |  |
| 537 | `AssetFieldsService::deleteField` | **delete** [asset_field_set_fields](/code/tables/asset_field_set_fields.md) |  |

**Called from:** [api/assets/delete_asset_field.php](/code/files/api/assets/delete_asset_field.php.md)

### saveSet

*public static* - line 541

Create or update a field set.

```php
function saveSet(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 553 | `AssetFieldsService::saveSet` | **update** [asset_field_sets](/code/tables/asset_field_sets.md) (`name`, `description`, `display_order`) |  |
| 558 | `AssetFieldsService::saveSet` | **insert** [asset_field_sets](/code/tables/asset_field_sets.md) (`name`, `description`, `display_order`, `tenant_id`) |  |

**Called from:** [api/assets/save_asset_field_set.php](/code/files/api/assets/save_asset_field_set.php.md)

### deleteSet

*public static* - line 570

Retire a set. Soft delete, and its attachments go with it.

The VALUES survive — the same reasoning as `detachSetFromAsset()`. Deleting
a set is a statement about which fields to show, never about the answers
already given.

```php
function deleteSet(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 573 | `AssetFieldsService::deleteSet` | **update** [asset_field_sets](/code/tables/asset_field_sets.md) (`is_deleted`) |  |
| 574 | `AssetFieldsService::deleteSet` | **delete** [asset_type_field_sets](/code/tables/asset_type_field_sets.md) |  |
| 575 | `AssetFieldsService::deleteSet` | **delete** [asset_field_set_assets](/code/tables/asset_field_set_assets.md) |  |

**Called from:** [api/assets/delete_asset_field_set.php](/code/files/api/assets/delete_asset_field_set.php.md)

### setSetFields

*public static* - line 584

Replace the field list of a set.

Whole-list replace rather than add/remove calls, so one drag-reorder is
one request and the order can never end up half-applied.

```php
function setSetFields(PDO $conn, int $setId, array $rows): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$setId` | `int` |  |  |
| `$rows` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 593 | `AssetFieldsService::setSetFields` | **delete** [asset_field_set_fields](/code/tables/asset_field_set_fields.md) |  |
| 595 | `AssetFieldsService::setSetFields` | **insert** [asset_field_set_fields](/code/tables/asset_field_set_fields.md) (`set_id`, `field_id`, `sort_order`, `is_required`, `default_value`) |  |

**Called from:** [api/assets/save_asset_field_set.php](/code/files/api/assets/save_asset_field_set.php.md)

### setTypeSets

*public static* - line 624

Replace which sets are attached to an asset type.

```php
function setTypeSets(PDO $conn, int $assetTypeId, array $setIds): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetTypeId` | `int` |  |  |
| `$setIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 631 | `AssetFieldsService::setTypeSets` | **delete** [asset_type_field_sets](/code/tables/asset_type_field_sets.md) |  |
| 633 | `AssetFieldsService::setTypeSets` | **insert** [asset_type_field_sets](/code/tables/asset_type_field_sets.md) (`asset_type_id`, `set_id`, `sort_order`) |  |

**Called from:** [api/assets/save_type_field_sets.php](/code/files/api/assets/save_type_field_sets.php.md)

### assertType

*private static* - line 659

Validates a custom field type; a link field must also name a valid ref_kind.

```php
function assertType(string $type, array $config): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$type` | `string` |  |  |
| `$config` | `array` |  |  |

### makeKey

*private static* - line 676

A stable machine key from a label: lowercase, underscores, no leading digit.

```php
function makeKey(PDO $conn, string $seed): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$seed` | `string` |  |  |

### assertKeyFree

*private static* - line 693

⚠️ Application-level uniqueness, because the UNIQUE index cannot do it: MySQL treats NULLs as distinct, so two GLOBAL fields could both claim `serial_number` while the index looked like it was guarding them. Exactly the trap documented on assets.asset_tag.

```php
function assertKeyFree(PDO $conn, string $key, ?int $tenantId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$tenantId` | `?int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 696 | `AssetFieldsService::assertKeyFree` | read [asset_fields](/code/tables/asset_fields.md) |  |
| 700 | `AssetFieldsService::assertKeyFree` | read [asset_fields](/code/tables/asset_fields.md) |  |

### configTenantForCreate

*private static* - line 711

Which company a new catalogue row belongs to. NULL = a global default.

```php
function configTenantForCreate(PDO $conn, ActorContext $ctx): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |

### saveOptions

*private static* - line 729

Replaces a dropdown field's option list, skipping blanks and duplicates; a field that is not a dropdown loses its options.

Leaves the list alone when no options were sent.

```php
function saveOptions(PDO $conn, int $fieldId, string $type, $options): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$fieldId` | `int` |  |  |
| `$type` | `string` |  |  |
| `$options` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 737 | `AssetFieldsService::saveOptions` | **delete** [asset_field_options](/code/tables/asset_field_options.md) |  |
| 740 | `AssetFieldsService::saveOptions` | **delete** [asset_field_options](/code/tables/asset_field_options.md) |  |
| 742 | `AssetFieldsService::saveOptions` | **insert** [asset_field_options](/code/tables/asset_field_options.md) (`field_id`, `option_value`, `colour`, `display_order`) |  |

### fieldHasValues

*private static* - line 757

True when any asset has a value stored for the field.

```php
function fieldHasValues(PDO $conn, int $fieldId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$fieldId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 759 | `AssetFieldsService::fieldHasValues` | read [asset_field_values](/code/tables/asset_field_values.md) |  |

### loadField

*private static* - line 765

Loads one custom field that has not been deleted; throws not found otherwise.

```php
function loadField(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 767 | `AssetFieldsService::loadField` | read [asset_fields](/code/tables/asset_fields.md) |  |

### nullIfBlank

*private static* - line 777

Trimmed text, or null when blank.

```php
function nullIfBlank($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### catalogue

*public static* - line 788

Every field in the catalogue visible to this company (global + own).

```php
function catalogue(PDO $conn, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md), [api/assets/get_asset_fields.php](/code/files/api/assets/get_asset_fields.php.md), [api/assets/import_upload.php](/code/files/api/assets/import_upload.php.md), [asset-management/table.php](/code/files/asset-management/table.php.md), [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md)

### sets

*public static* - line 806

Every field set visible to this company (global + own).

```php
function sets(PDO $conn, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md), [api/assets/get_asset_fields.php](/code/files/api/assets/get_asset_fields.php.md)

### loadAsset

*private static* - line 824

Loads an asset's id, type and company; throws not found when it does not exist.

```php
function loadAsset(PDO $conn, int $assetId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 826 | `AssetFieldsService::loadAsset` | read [assets](/code/tables/assets.md) |  |

### loadSet

*private static* - line 836

Loads one field set that has not been deleted; throws not found otherwise.

```php
function loadSet(PDO $conn, int $setId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$setId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 838 | `AssetFieldsService::loadSet` | read [asset_field_sets](/code/tables/asset_field_sets.md) |  |

### tenantOfAsset

*private static* - line 848

The company id of an asset, or null.

```php
function tenantOfAsset(PDO $conn, int $assetId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 850 | `AssetFieldsService::tenantOfAsset` | read [assets](/code/tables/assets.md) |  |

