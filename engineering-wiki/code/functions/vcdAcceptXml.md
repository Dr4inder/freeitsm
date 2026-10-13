# vcdAcceptXml()

The Accept header for a legacy /api (XML) call at the connection's API version.

```php
function vcdAcceptXml(string $version): array
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 80.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$version` | `string` |  |  |

**Returns:** `array`

## Called from

- [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md) - in [vcdTest()](/code/functions/vcdTest.md), [vcdSyncConnection()](/code/functions/vcdSyncConnection.md), [vcdVmRecord()](/code/functions/vcdVmRecord.md)

