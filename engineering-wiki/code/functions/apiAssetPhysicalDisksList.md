# apiAssetPhysicalDisksList()

The physical drives, as opposed to the lettered volumes above (#97).

Its own endpoint rather than extra fields on /disks: one drive carries
several volumes and one volume can span several drives, so there is no
honest way to fold them into the same row. Exposed at all because the
serial is the point of the data — a disposal audit or a warranty claim is
exactly the sort of thing somebody scripts, and a serial the screen shows
but the API cannot reach would be a strange place to stop.

The table only exists after Database Verification has run, so an install
mid-upgrade gets an empty list rather than a 500.

```php
function apiAssetPhysicalDisksList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 529.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 533 | `apiAssetPhysicalDisksList` | read [asset_physical_disks](/code/tables/asset_physical_disks.md) |  |

## Calls

[apiLoadAsset()](/code/functions/apiLoadAsset.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

