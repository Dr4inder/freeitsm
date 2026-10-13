# apiSerializeAsset()

```php
function apiSerializeAsset(PDO $conn, array $r): array
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 89.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$r` | `array` |  |  |

**Returns:** `array`

## Calls

[apiAssetCustomFields()](/code/functions/apiAssetCustomFields.md), [apiAssetLocationPath()](/code/functions/apiAssetLocationPath.md), [apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) - in [apiAssetsList()](/code/functions/apiAssetsList.md), [apiAssetsGet()](/code/functions/apiAssetsGet.md), [apiAssetsCreate()](/code/functions/apiAssetsCreate.md), [apiAssetsUpdate()](/code/functions/apiAssetsUpdate.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::fullObjectLoaders`

