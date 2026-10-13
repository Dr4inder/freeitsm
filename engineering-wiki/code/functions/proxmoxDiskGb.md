# proxmoxDiskGb()

Provisioned disk size in GB, from the config keys (not live usage).

```php
function proxmoxDiskGb(array $cfg, string $type): ?float
```

Defined in [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md), line 394.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$type` | `string` |  |  |

**Returns:** `?float`

## Called from

- [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md) - in [proxmoxVmDetails()](/code/functions/proxmoxVmDetails.md)

