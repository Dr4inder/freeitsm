# includes/vcloud_sync.php

> PHP - 464 lines

VMware Cloud Director sync — VMs, their NICs and disks, and edge gateways, from one vCD server into vcloud_vms / vcloud_edge_gateways. Several servers are supported: every row is keyed by connection_id.

API use, and why:
  - cloudapi (JSON) for the session and the edge gateways;
  - the legacy /api (XML) for the VM inventory (/api/query?type=vm), and each
    VM's NICs and disks. The XML is read by local element names, so it does not
    depend on one namespace URI (the namespace differs between provider and
    tenant org responses).

Rules, the same as the Proxmox sync:
  - a VM's identity is (connection, VM uuid), which survives renames and vApp moves.
  - a VM is removed only after a COMPLETE inventory read. A page that failed means
    the list is partial, so nothing is removed that cycle.
  - SAFETY GUARD: fewer than half of the known VMs seen means nothing is deleted.
  - edge gateways follow the same rule: removed only after every page was read.

Every request goes through HypervisorHttp (https only, the shared CA bundle).
Each sync and test logs its session out again (vcdLogout()). Read-only:
nothing here ever changes anything in Director.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [vcdLoadConnection()](/code/functions/vcdLoadConnection.md) | 33 |  |
| [vcdHttp()](/code/functions/vcdHttp.md) | 49 | One HTTP call. Returns [status code, body, access token from the response headers]. Throws only when the server cannot be reached at all; HTTP errors are returned. |
| [vcdAcceptJson()](/code/functions/vcdAcceptJson.md) | 67 |  |
| [vcdAcceptXml()](/code/functions/vcdAcceptXml.md) | 72 |  |
| [vcdLogin()](/code/functions/vcdLogin.md) | 78 | Session: Basic auth as "user@org", and the access token comes back in a response header. |
| [vcdLogout()](/code/functions/vcdLogout.md) | 98 | End the session again. Best-effort. |
| [vcdTryGet()](/code/functions/vcdTryGet.md) | 108 | A GET that returns the body on success, or null on any failure (per-item problems never stop a sync). |
| [vcdXml()](/code/functions/vcdXml.md) | 118 |  |
| [vcdFind()](/code/functions/vcdFind.md) | 129 | Elements by local name, ignoring namespaces. |
| [vcdTest()](/code/functions/vcdTest.md) | 135 |  |
| [vcdSyncConnection()](/code/functions/vcdSyncConnection.md) | 151 | Sync one server. Never throws for a per-VM problem: those are counted and reported. Returns a summary and records it on the connection row. |
| [vcdVmRecord()](/code/functions/vcdVmRecord.md) | 302 | One VM record from the inventory, with its NICs and disks. Null if it has no usable uuid. |
| [vcdSaveConnection()](/code/functions/vcdSaveConnection.md) | 391 | Save a server from the settings form. Returns its id. |
| [vcdConnectionOut()](/code/functions/vcdConnectionOut.md) | 446 | A server as the browser may see it: never the password, only whether there is one. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 35 | `vcdLoadConnection` | read [vcloud_connections](/code/tables/vcloud_connections.md) |  |
| 193 | `vcdSyncConnection` | **insert** [vcloud_vms](/code/tables/vcloud_vms.md) (`connection_id`, `vm_uuid`, `name`, `org_vdc`, `vapp_name`, `status`, `vcpus`, `memory_mb`, `disk_gb`, `ip_addresses`, `mac_addresses`, `details_json`) |  |
| 208 | `vcdSyncConnection` | read [vcloud_vms](/code/tables/vcloud_vms.md) |  |
| 220 | `vcdSyncConnection` | **delete** [vcloud_vms](/code/tables/vcloud_vms.md) |  |
| 251 | `vcdSyncConnection` | **insert** [vcloud_edge_gateways](/code/tables/vcloud_edge_gateways.md) (`connection_id`, `gateway_id`, `name`, `org_vdc`, `status`, `uplink_ips`, `details_json`, `last_seen_datetime`) |  |
| 275 | `vcdSyncConnection` | **delete** [vcloud_edge_gateways](/code/tables/vcloud_edge_gateways.md) |  |
| 295 | `vcdSyncConnection` | **update** [vcloud_connections](/code/tables/vcloud_connections.md) (`last_sync_datetime`, `last_sync_status`, `last_sync_message`) |  |
| 418 | `vcdSaveConnection` | read [vcloud_connections](/code/tables/vcloud_connections.md) |  |
| 433 | `vcdSaveConnection` | **update** [vcloud_connections](/code/tables/vcloud_connections.md) (`name`, `host`, `org`, `username`, `password_enc`, `api_version`, `verify_ssl`, `is_active`, `sync_interval_minutes`) |  |
| 439 | `vcdSaveConnection` | **insert** [vcloud_connections](/code/tables/vcloud_connections.md) (`name`, `host`, `org`, `username`, `password_enc`, `api_version`, `verify_ssl`, `is_active`, `sync_interval_minutes`) |  |

## How it hangs together

**Includes:** [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/hypervisor_http.php](/code/files/includes/hypervisor_http.php.md)

**Included by:** [api/assets/sync_hypervisors.php](/code/files/api/assets/sync_hypervisors.php.md), [api/assets/vcloud_connections.php](/code/files/api/assets/vcloud_connections.php.md), [api/assets/vcloud_sync.php](/code/files/api/assets/vcloud_sync.php.md), [cron/vcloud_sync.php](/code/files/cron/vcloud_sync.php.md)

**Calls:** [decryptValue()](/code/functions/decryptValue.md), [encryptValue()](/code/functions/encryptValue.md)

## Traps

> [!WARNING]
> **Line 179, in `vcdSyncConnection`:** count what ARRIVED, never page x the size we asked for. The PR stopped when page * 128 >= total, but Director caps a page at its own maximum (restapi.queryservice.maxPageSize, which an admin can lower). On such a system page 1 came back short, the loop stopped, the list counted as complete - and every VM after the first page was deleted.

> [!WARNING]
> **Line 231, in `vcdSyncConnection`:** every page, and remove only after all of them came back. The PR read one page of 128 and then deleted every gateway not on it, so an install with more than 128 lost the rest on every sync.

> [!WARNING]
> **Line 381:** the password is stored only through `encryptValue()`, never returned to the browser (vcdConnectionOut() says has_password and nothing more), and a blank or all-asterisks value on edit keeps the stored one.

