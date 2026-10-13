# intuneLinkDevicesToAssets()

Link intune_devices to assets, then create stub assets for any device still unlinked. Returns counts so the sync job message can show what happened.

─────────────────────────────────────────────────────────────────────────
🔑 AN EXISTING LINK IS TRUSTED, WHEREVER THE ASSET NOW IS (PR #164)

Multi-tenancy: Intune is a single MSP-level connection that can hold machines
from several client companies, so there is no per-key company to derive here
(unlike the agent ingest paths). The workflow this supports: a stub lands in
one company - the Default company unless Assets -> Settings -> Intune names
another - and an analyst MOVES it to the client it belongs to. A link made by
an earlier sync is therefore never second-guessed because its asset is now in
a different company: a person put it there. Doing otherwise cleared the link
of every moved machine and made a duplicate stub on the next sync.

The company setting decides only NEW things: which company's assets an
unlinked device may be matched to, and where a new stub goes. Unset - every
install after upgrade - matches across all companies, exactly as the old
hostname-only link did, and creates stubs in the Default company.

Matching itself is AssetsService::reconcileAsset(): serial first, then
hostname, with the placeholder-serial list and the laptop-refresh rule.

```php
function intuneLinkDevicesToAssets(PDO $conn, ?int $companyId = null): array
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 278.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$companyId` | `?int` | `null` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 303 | `intuneLinkDevicesToAssets` | read [intune_devices](/code/tables/intune_devices.md), read [assets](/code/tables/assets.md) |  |
| 315 | `intuneLinkDevicesToAssets` | read [intune_devices](/code/tables/intune_devices.md) |  |
| 323 | `intuneLinkDevicesToAssets` | **update** [intune_devices](/code/tables/intune_devices.md) (`asset_id`) |  |
| 348 | `intuneLinkDevicesToAssets` | read [intune_devices](/code/tables/intune_devices.md) |  |

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [intuneGetSettings()](/code/functions/intuneGetSettings.md)

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneRunSync()](/code/functions/intuneRunSync.md)

