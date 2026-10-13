# assets/js/proxmox-settings.js

> JavaScript - 151 lines

Proxmox VE servers on the asset-management settings page: list, add/edit, delete, test, sync now, and the VMs a sync found. Talks to api/assets/proxmox_*.php. Passwords are never read back: the form shows a placeholder and a blank field keeps the stored password.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 10 |  |
| `call(path, opts)` | 13 |  |
| `statusBadge(s)` | 18 |  |
| `proxmoxLoad()` | 25 |  |
| `proxmoxOpenForm(id)` | 55 |  |
| `proxmoxCloseForm()` | 69 |  |
| `proxmoxSave(e)` | 73 |  |
| `proxmoxDelete(id)` | 96 |  |
| `run(id, btn, action)` | 104 |  |
| `proxmoxTest(id, btn)` | 123 |  |
| `proxmoxSync(id, btn)` | 124 |  |
| `proxmoxShowVms(id)` | 126 |  |

## Loaded by

- [asset-management/settings/index.php](/code/files/asset-management/settings/index.php.md)

