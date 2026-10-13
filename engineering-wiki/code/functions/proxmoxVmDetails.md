# proxmoxVmDetails()

Everything we keep about one VM, from its list entry plus its config (and guest agent for IPs).

```php
function proxmoxVmDetails(
    array $c,
    array $auth,
    string $type,
    string $node,
    int $vmid,
    array $listEntry,
    string $clusterName
): array
```

Defined in [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md), line 270.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$c` | `array` |  |  |
| `$auth` | `array` |  |  |
| `$type` | `string` |  |  |
| `$node` | `string` |  |  |
| `$vmid` | `int` |  |  |
| `$listEntry` | `array` |  |  |
| `$clusterName` | `string` |  |  |

**Returns:** `array`

## Calls

[proxmoxDiskGb()](/code/functions/proxmoxDiskGb.md), [proxmoxTryGet()](/code/functions/proxmoxTryGet.md), [proxmoxVmDetailBlock()](/code/functions/proxmoxVmDetailBlock.md)

## Called from

- [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md) - in [proxmoxSyncConnection()](/code/functions/proxmoxSyncConnection.md)

