# contractAssetLink()

Link an asset to a contract. Returns the new link id.

Re-linking something already linked updates the reference rather than
failing: the unique key makes a second row impossible, and "it is already on
here" is not an error anybody wants to read.

```php
function contractAssetLink(
    PDO $conn,
    int $analystId,
    int $contractId,
    int $assetId,
    ?string $reference
): int
```

Defined in [includes/contract_assets.php](/code/files/includes/contract_assets.php.md), line 147.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$contractId` | `int` |  |  |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$reference` | `?string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 161 | `contractAssetLink` | read [assets](/code/tables/assets.md) |  |
| 174 | `contractAssetLink` | **insert** [contract_assets](/code/tables/contract_assets.md) (`contract_id`, `asset_id`, `reference`, `linked_by_id`, `created_datetime`) |  |
| 179 | `contractAssetLink` | read [contract_assets](/code/tables/contract_assets.md) |  |

## Calls

[contractAssetCanReach()](/code/functions/contractAssetCanReach.md), [contractCanView()](/code/functions/contractCanView.md), [contractTenantOf()](/code/functions/contractTenantOf.md), [contractTenantReady()](/code/functions/contractTenantReady.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/contracts/save_contract_asset.php](/code/files/api/contracts/save_contract_asset.php.md)

