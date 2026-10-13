# vcdTryGet()

A GET that returns the body on success, or null on any failure (per-item problems never stop a sync).

```php
function vcdTryGet(array $c, string $token, string $path, array $headers): ?string
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 116.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$c` | `array` |  |  |
| `$token` | `string` |  |  |
| `$path` | `string` |  |  |
| `$headers` | `array` |  |  |

**Returns:** `?string`

## Calls

[vcdHttp()](/code/functions/vcdHttp.md)

## Called from

- [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md) - in [vcdTest()](/code/functions/vcdTest.md), [vcdSyncConnection()](/code/functions/vcdSyncConnection.md), [vcdVmRecord()](/code/functions/vcdVmRecord.md)

