# apiLoadAsset()

Load one asset (with joins); 404 if unknown OR outside the key's companies (multi-tenancy — the key's company scope gates every by-id read/write; a NULL tenant_id normalises to the Default company; no-op at N=1 / all-access key).

```php
function apiLoadAsset(PDO $conn, array $apiKey, int $assetId): array
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 200.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$assetId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiAssetSelect()](/code/functions/apiAssetSelect.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) - in [apiAssetsGet()](/code/functions/apiAssetsGet.md), [apiAssetsCreate()](/code/functions/apiAssetsCreate.md), [apiAssetsUpdate()](/code/functions/apiAssetsUpdate.md), [apiAssetAssignmentsList()](/code/functions/apiAssetAssignmentsList.md), [apiAssetHistoryList()](/code/functions/apiAssetHistoryList.md), [apiAssetCustodyList()](/code/functions/apiAssetCustodyList.md), [apiAssetDisksList()](/code/functions/apiAssetDisksList.md), [apiAssetPhysicalDisksList()](/code/functions/apiAssetPhysicalDisksList.md), [apiAssetNetworkAdaptersList()](/code/functions/apiAssetNetworkAdaptersList.md), [apiAssetDevicesList()](/code/functions/apiAssetDevicesList.md), [apiAssetSoftwareList()](/code/functions/apiAssetSoftwareList.md)

