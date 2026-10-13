# assetIdForToken()

Resolve a scanned token to an asset id. Returns null for unknown tokens.

```php
function assetIdForToken(PDO $conn, string $token): ?int
```

Defined in [includes/asset_labels.php](/code/files/includes/asset_labels.php.md), line 103.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$token` | `string` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 109 | `assetIdForToken` | read [assets](/code/tables/assets.md) |  |

## Calls

[assetLabelsSchemaReady()](/code/functions/assetLabelsSchemaReady.md)

## Called from

- [api/assets/resolve_scan.php](/code/files/api/assets/resolve_scan.php.md)
- [asset-management/scan.php](/code/files/asset-management/scan.php.md)

