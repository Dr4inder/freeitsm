# assets/js/vcloud-settings.js

> JavaScript - 173 lines

VMware Cloud Director servers on the asset-management settings page: list, add/edit, delete, test, sync now, and the VMs a sync found. Talks to api/assets/vcloud_*.php. Passwords are never read back: the form shows a placeholder and a blank field keeps the stored password.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `call(path, opts)` | 13 |  |
| `statusBadge(s)` | 18 |  |
| `run(id, btn, action)` | 108 |  |
| `renderEdges(edges)` | 153 |  |

## Loaded by

- [asset-management/settings/index.php](/code/files/asset-management/settings/index.php.md)

