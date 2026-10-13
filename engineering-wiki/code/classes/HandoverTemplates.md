# HandoverTemplates

> Class in [includes/services/handover_templates.php](/code/files/includes/services/handover_templates.php.md), line 35

## Methods

| Method | What it does |
|---|---|
| [catalogue()](#catalogue) | The block catalogue. `text` lists the editable plain-text fields on that block, with their defaults. |
| [assetColumns()](#assetcolumns) | Columns the equipment table can show, and their defaults. |
| [customColumns()](#customcolumns) | Custom asset fields available as handover columns, as `cf:<key>` => label. |
| [mergeCodes()](#mergecodes) | Merge codes, as code => description key. |
| [defaultBlocks()](#defaultblocks) | The template used when nobody has made one — the document as it shipped. |
| [sanitiseBlocks()](#sanitiseblocks) | Force whatever arrived from the browser into the shape above. |
| [listAll()](#listall) |  |
| [load()](#load) |  |
| [effective()](#effective) | The template a handover document should use. |
| [save()](#save) |  |
| [makeDefault()](#makedefault) | Exactly one default. Cleared for everyone else in the same breath. |
| [delete()](#delete) |  |
| [mergeValues()](#mergevalues) | The values merge codes resolve to, for this person on this day. |
| [mergeText()](#mergetext) | Escape first, substitute second. |
| [renderBlocks()](#renderblocks) | Render the document body as HTML. |
| [renderAssetTable()](#renderassettable) |  |

### catalogue

*public static* - line 45

The block catalogue. `text` lists the editable plain-text fields on that block, with their defaults.

⚠️ Adding a block here adds it to the designer and the renderer. A block
NOT in this list is dropped on save — that is what makes stored templates
safe to render without further checking.

```php
function catalogue(): array
```

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### assetColumns

*public static* - line 77

Columns the equipment table can show, and their defaults.

With a `$conn`, every custom asset field is offered too, keyed `cf:<key>`
and defaulting to OFF — a handover document is a legal-ish record that
somebody signs, so nothing appears on it that an administrator has not
deliberately put there.

⚠️ Offering ALL custom fields rather than only the ones ticked "offer as
a column": that flag is about the asset LIST, and a serial-number-ish
field you would never put in a table is exactly the sort of thing you do
want on a handover. Overloading one flag for two unrelated screens is how
settings stop meaning anything.

```php
function assetColumns(?PDO $conn = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` | `null` |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### customColumns

*public static* - line 102

Custom asset fields available as handover columns, as `cf:<key>` => label.

Cached per request: this is called from the designer, the validator and
the renderer, and none of them should each pay for it.

```php
function customColumns(?PDO $conn = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 115 | `HandoverTemplates::customColumns` | read [asset_fields](/code/tables/asset_fields.md) |  |

### mergeCodes

*public static* - line 136

Merge codes, as code => description key.

⚠️ This is the whole list. A code not here is left alone rather than
blanked, so a typo shows up in the preview as itself instead of silently
vanishing — which is the difference between "I mistyped" and "the feature
is broken".

```php
function mergeCodes(): array
```

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### defaultBlocks

*public static* - line 149

The template used when nobody has made one — the document as it shipped.

```php
function defaultBlocks(): array
```

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### sanitiseBlocks

*public static* - line 173

Force whatever arrived from the browser into the shape above.

Unknown block types are dropped, unknown text fields are dropped, unknown
columns are dropped, and anything missing falls back to its default. The
result is always renderable, which is why `renderBlocks()` does no checking
of its own.

```php
function sanitiseBlocks($input): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$input` |  |  |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### listAll

*public static* - line 231

```php
function listAll(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 235 | `HandoverTemplates::listAll` | read [asset_handover_templates](/code/tables/asset_handover_templates.md) |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### load

*public static* - line 249

```php
function load(PDO $conn, int $id): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 252 | `HandoverTemplates::load` | read [asset_handover_templates](/code/tables/asset_handover_templates.md) |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### effective

*public static* - line 270

The template a handover document should use.

Falls back to the shipped default rather than failing: a handover document
must be printable on an install that has never opened the designer, and on
one where somebody deactivated every template.

```php
function effective(PDO $conn, ?int $id = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 285 | `HandoverTemplates::effective` | read [asset_handover_templates](/code/tables/asset_handover_templates.md) |  |

**Called from:** [api/assets/email_handover.php](/code/files/api/assets/email_handover.php.md), [asset-management/handover.php](/code/files/asset-management/handover.php.md)

### save

*public static* - line 300

```php
function save(PDO $conn, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 312 | `HandoverTemplates::save` | **update** [asset_handover_templates](/code/tables/asset_handover_templates.md) (`name`, `blocks`, `is_active`, `updated_datetime`) |  |
| 318 | `HandoverTemplates::save` | **insert** [asset_handover_templates](/code/tables/asset_handover_templates.md) (`name`, `blocks`, `is_active`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### makeDefault

*public static* - line 331

Exactly one default. Cleared for everyone else in the same breath.

```php
function makeDefault(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 333 | `HandoverTemplates::makeDefault` | **update** [asset_handover_templates](/code/tables/asset_handover_templates.md) (`is_default`) |  |
| 334 | `HandoverTemplates::makeDefault` | **update** [asset_handover_templates](/code/tables/asset_handover_templates.md) (`is_default`, `is_active`) |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### delete

*public static* - line 337

```php
function delete(PDO $conn, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 339 | `HandoverTemplates::delete` | **delete** [asset_handover_templates](/code/tables/asset_handover_templates.md) |  |

**Called from:** [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md)

### mergeValues

*public static* - line 347

The values merge codes resolve to, for this person on this day.

```php
function mergeValues(array $user, array $assets, ?string $analystName): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$user` | `array` |  |  |
| `$assets` | `array` |  |  |
| `$analystName` | `?string` |  |  |

### mergeText

*private static* - line 367

Escape first, substitute second.

⚠️ THE ORDER IS THE SECURITY. Escaping the finished string instead would
escape the caller's own markup; substituting into un-escaped text would let
a display name containing markup reach a document that is emailed out.
Values are escaped individually, then dropped into already-escaped text.

```php
function mergeText(string $text, array $values): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$text` | `string` |  |  |
| `$values` | `array` |  |  |

### renderBlocks

*public static* - line 382

Render the document body as HTML.

Returns markup for the inside of the sheet — the page (or the email) supplies
the wrapper and the stylesheet, so the same renderer serves the printable
page, the designer preview and the emailed copy without three layouts.

```php
function renderBlocks(array $blocks, array $user, array $assets, array $opts = []): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$blocks` | `array` |  |  |
| `$user` | `array` |  |  |
| `$assets` | `array` |  |  |
| `$opts` | `array` | `[]` |  |

**Called from:** [api/assets/email_handover.php](/code/files/api/assets/email_handover.php.md), [api/assets/handover_templates.php](/code/files/api/assets/handover_templates.php.md), [asset-management/handover.php](/code/files/asset-management/handover.php.md)

### renderAssetTable

*private static* - line 466

```php
function renderAssetTable(array $assets, array $cols, callable $L): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$assets` | `array` |  |  |
| `$cols` | `array` |  |  |
| `$L` | `callable` |  |  |

