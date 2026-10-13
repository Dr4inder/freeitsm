# intuneFetchDeviceApps()

Fetch the detectedApps array for a single Intune-managed device.

```php
function intuneFetchDeviceApps(string $intuneId, array $settings): array
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 690.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$intuneId` | `string` |  |  |
| `$settings` | `array` |  |  |

**Returns:** `array`

## Calls

[intuneGraphGet()](/code/functions/intuneGraphGet.md)

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneRunAppSyncJob()](/code/functions/intuneRunAppSyncJob.md)

