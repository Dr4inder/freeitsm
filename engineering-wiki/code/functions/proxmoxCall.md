# proxmoxCall()

One API call. `$auth` is null for the login call itself. Throws with a readable message.

```php
function proxmoxCall(
    array $c,
    string $method,
    string $path,
    ?array $form = null,
    ?array $auth = null
): array
```

Defined in [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md), line 71.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$c` | `array` |  |  |
| `$method` | `string` |  |  |
| `$path` | `string` |  |  |
| `$form` | `?array` | `null` |  |
| `$auth` | `?array` | `null` |  |

**Returns:** `array`

## Called from

- [includes/proxmox_sync.php](/code/files/includes/proxmox_sync.php.md) - in [proxmoxLogin()](/code/functions/proxmoxLogin.md), [proxmoxTryGet()](/code/functions/proxmoxTryGet.md), [proxmoxTestConnection()](/code/functions/proxmoxTestConnection.md), [proxmoxSyncConnection()](/code/functions/proxmoxSyncConnection.md)

