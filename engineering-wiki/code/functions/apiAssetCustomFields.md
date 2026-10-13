# apiAssetCustomFields()

Custom field values for one asset, as { field_key: value }.

⚠️ Per-asset, because the serializer is per-asset — so a LIST endpoint pays
one query per row. Acceptable at the page sizes this API returns, and the
batched reader (AssetFieldsService::readForAssets) is there for when it is
not. Flagged rather than hidden: if list latency ever matters, this is the
line to change.

```php
function apiAssetCustomFields(PDO $conn, int $assetId, ?int $assetTypeId): array
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 179.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$assetId` | `int` |  | The id of the asset. *([standard](/handbook/standard-parameters.md))* |
| `$assetTypeId` | `?int` |  |  |

**Returns:** `array`

## Called from

- [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) - in [apiSerializeAsset()](/code/functions/apiSerializeAsset.md)

