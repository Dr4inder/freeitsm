# AssetTagsService

> Class in [includes/services/asset_tags.php](/code/files/includes/services/asset_tags.php.md), line 46

## Methods

| Method | What it does |
|---|---|
| [withSettings()](#withsettings) | Run with a specific configuration — used by the tests. |
| [forget()](#forget) | Drop the override and the settings cache. |
| [config()](#config) | The effective configuration for one company (null = Default). |
| [isAutogenEnabled()](#isautogenenabled) |  |
| [validateFormat()](#validateformat) | What is wrong with a format, in words an administrator can act on. Empty means it is usable. |
| [preview()](#preview) | A few example tags for a proposed configuration. Writes nothing. |
| [storeTenant()](#storetenant) | Assets store the Default company as NULL; so does every check here. |
| [counterKey()](#counterkey) | Which counter a company draws from. |
| [nextNumber()](#nextnumber) | The number the next generated tag will carry. Reads only. |
| [setNextNumber()](#setnextnumber) | Make the next generated tag at least `$next`. Only ever forward. |
| [windCounterTo()](#windcounterto) |  |
| [claimNext()](#claimnext) | Claim the next number. Same statement, and the same `rowCount()` trap, as TicketNumbering::claimNext(). |
| [generate()](#generate) | The next generated tag for a company. Call it inside `withLock()` and inside the transaction that writes the asset, so a failed write gives the number back. Uniqueness is proven against the assets, never assumed from the counter: a counter can be behind (a restored backup, tags typed by hand). |
| [noteManualTag()](#notemanualtag) | A tag typed by hand that has the generated SHAPE and a number ahead of the counter winds the counter past it, so the generator never has to skip it later. Anything else is left alone. |
| [withLock()](#withlock) | Run `$fn` holding the per-company tag lock. Fails closed: a lock that cannot be had is an error, never "carry on unguarded". |
| [clashMessage()](#clashmessage) | The plain message for a tag that is taken, naming where. |
| [createWithTag()](#createwithtag) | Create an asset that may carry a tag: typed in (`$manualTag`), generated (when switched on for the company and nothing was typed), or none. Takes the lock when a tag is involved, and runs `$insert` inside a transaction - the caller's, if it already has one - so the counter claim, the insert and whatever `$insert` audits succeed or fail together. |
| [assign()](#assign) | Change an existing asset's tag (the box on the asset page). Blank clears it. Recorded in the asset's history. The caller has already checked the analyst may see the asset. |

### withSettings

*public static* - line 69

Run with a specific configuration — used by the tests.

```php
function withSettings(?array $settings): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$settings` | `?array` |  |  |

### forget

*public static* - line 75

Drop the override and the settings cache.

```php
function forget(): void
```

**Called from:** [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### config

*public static* - line 86

The effective configuration for one company (null = Default).

```php
function config(PDO $conn, ?int $tenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Called from:** [api/assets/get_asset_tag_settings.php](/code/files/api/assets/get_asset_tag_settings.php.md), [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### isAutogenEnabled

*public static* - line 100

```php
function isAutogenEnabled(PDO $conn, ?int $tenantId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

### validateFormat

*public static* - line 109

What is wrong with a format, in words an administrator can act on. Empty means it is usable.

```php
function validateFormat(string $format): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$format` | `string` |  |  |

**Called from:** [api/assets/asset_tag_preview.php](/code/files/api/assets/asset_tag_preview.php.md), [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### preview

*public static* - line 137

A few example tags for a proposed configuration. Writes nothing.

```php
function preview(array $cfg, int $start, int $count = 3): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$start` | `int` |  |  |
| `$count` | `int` | `3` |  |

**Called from:** [api/assets/asset_tag_preview.php](/code/files/api/assets/asset_tag_preview.php.md), [api/assets/get_asset_tag_settings.php](/code/files/api/assets/get_asset_tag_settings.php.md), [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### storeTenant

*public static* - line 154

Assets store the Default company as NULL; so does every check here.

```php
function storeTenant(PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Called from:** [includes/services/assets.php](/code/files/includes/services/assets.php.md)

### counterKey

*public static* - line 161

Which counter a company draws from.

```php
function counterKey(PDO $conn, array $cfg, ?int $tenantId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$cfg` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

### nextNumber

*public static* - line 170

The number the next generated tag will carry. Reads only.

```php
function nextNumber(PDO $conn, ?int $tenantId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 174 | `AssetTagsService::nextNumber` | read [asset_tag_counters](/code/tables/asset_tag_counters.md) |  |

**Called from:** [api/assets/get_asset_tag_settings.php](/code/files/api/assets/get_asset_tag_settings.php.md), [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### setNextNumber

*public static* - line 185

Make the next generated tag at least `$next`. Only ever forward.

```php
function setNextNumber(PDO $conn, ?int $tenantId, int $next): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$next` | `int` |  |  |

**Called from:** [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md)

### windCounterTo

*private static* - line 191

```php
function windCounterTo(PDO $conn, string $key, int $lastIssued): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$lastIssued` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 194 | `AssetTagsService::windCounterTo` | **insert** [asset_tag_counters](/code/tables/asset_tag_counters.md) (`counter_key`, `next_value`) |  |

### claimNext

*private static* - line 200

Claim the next number. Same statement, and the same `rowCount()` trap, as TicketNumbering::claimNext().

```php
function claimNext(PDO $conn, string $key, int $start): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$start` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 203 | `AssetTagsService::claimNext` | **insert** [asset_tag_counters](/code/tables/asset_tag_counters.md) (`counter_key`, `next_value`) |  |

### generate

*public static* - line 225

The next generated tag for a company. Call it inside `withLock()` and inside the transaction that writes the asset, so a failed write gives the number back. Uniqueness is proven against the assets, never assumed from the counter: a counter can be behind (a restored backup, tags typed by hand).

```php
function generate(PDO $conn, ?int $tenantId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

### noteManualTag

*public static* - line 258

A tag typed by hand that has the generated SHAPE and a number ahead of the counter winds the counter past it, so the generator never has to skip it later. Anything else is left alone.

```php
function noteManualTag(PDO $conn, ?int $tenantId, string $tag): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$tag` | `string` |  |  |

### withLock

*public static* - line 285

Run `$fn` holding the per-company tag lock. Fails closed: a lock that cannot be had is an error, never "carry on unguarded".

```php
function withLock(PDO $conn, ?int $tenantId, callable $fn)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$fn` | `callable` |  |  |

**Returns:** T

### clashMessage

*public static* - line 301

The plain message for a tag that is taken, naming where.

```php
function clashMessage(PDO $conn, ?int $storeTenant, string $tag, ?int $exceptAssetId = null): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$storeTenant` | `?int` |  |  |
| `$tag` | `string` |  |  |
| `$exceptAssetId` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 303 | `AssetTagsService::clashMessage` | read [assets](/code/tables/assets.md) |  |

### createWithTag

*public static* - line 323

Create an asset that may carry a tag: typed in (`$manualTag`), generated (when switched on for the company and nothing was typed), or none. Takes the lock when a tag is involved, and runs `$insert` inside a transaction - the caller's, if it already has one - so the counter claim, the insert and whatever `$insert` audits succeed or fail together.

```php
function createWithTag(PDO $conn, ?int $tenantId, ?string $manualTag, callable $insert): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |
| `$manualTag` | `?string` |  |  |
| `$insert` | `callable` |  | writes the asset with the given tag, returns its id |

**Returns:** array{id:int, tag:?string}

**Called from:** [includes/services/assets.php](/code/files/includes/services/assets.php.md)

### assign

*public static* - line 365

Change an existing asset's tag (the box on the asset page). Blank clears it. Recorded in the asset's history. The caller has already checked the analyst may see the asset.

```php
function assign(PDO $conn, ActorContext $ctx, int $assetId, string $tag): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$assetId` | `int` |  |  |
| `$tag` | `string` |  |  |

**Returns:** array{asset_tag:string, unchanged:bool}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 371 | `AssetTagsService::assign` | read [assets](/code/tables/assets.md) |  |
| 385 | `AssetTagsService::assign` | **update** [assets](/code/tables/assets.md) (`asset_tag`) |  |
| 389 | `AssetTagsService::assign` | **insert** [asset_history](/code/tables/asset_history.md) (`asset_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

**Called from:** [api/assets/save_asset_tag.php](/code/files/api/assets/save_asset_tag.php.md)

