# assets/js/vcloud-settings.js

> JavaScript - 173 lines

VMware Cloud Director servers on the asset-management settings page: list, add/edit, delete, test, sync now, and the VMs a sync found. Talks to api/assets/vcloud_*.php. Passwords are never read back: the form shows a placeholder and a blank field keeps the stored password.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 10 |  |
| `call(path, opts)` | 13 |  |
| `statusBadge(s)` | 18 |  |
| `vcloudLoad()` | 25 |  |
| `vcloudOpenForm(id)` | 55 |  |
| `vcloudCloseForm()` | 71 |  |
| `vcloudSave(e)` | 75 |  |
| `vcloudDelete(id)` | 100 |  |
| `run(id, btn, action)` | 108 |  |
| `vcloudTest(id, btn)` | 127 |  |
| `vcloudSync(id, btn)` | 128 |  |
| `vcloudShowVms(id)` | 130 |  |
| `renderEdges(edges)` | 153 | Edge gateways were synced and returned, but nothing showed them (added at merge). |

## Loaded by

- [asset-management/settings/index.php](/code/files/asset-management/settings/index.php.md)

