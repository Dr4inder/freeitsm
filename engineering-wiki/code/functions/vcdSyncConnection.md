# vcdSyncConnection()

Sync one server. Never throws for a per-VM problem: those are counted and reported. Returns a summary and records it on the connection row.

```php
function vcdSyncConnection(PDO $conn, int $connectionId): array
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 151.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$connectionId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 193 | `vcdSyncConnection` | **insert** [vcloud_vms](/code/tables/vcloud_vms.md) (`connection_id`, `vm_uuid`, `name`, `org_vdc`, `vapp_name`, `status`, `vcpus`, `memory_mb`, `disk_gb`, `ip_addresses`, `mac_addresses`, `details_json`) |  |
| 208 | `vcdSyncConnection` | read [vcloud_vms](/code/tables/vcloud_vms.md) |  |
| 220 | `vcdSyncConnection` | **delete** [vcloud_vms](/code/tables/vcloud_vms.md) |  |
| 251 | `vcdSyncConnection` | **insert** [vcloud_edge_gateways](/code/tables/vcloud_edge_gateways.md) (`connection_id`, `gateway_id`, `name`, `org_vdc`, `status`, `uplink_ips`, `details_json`, `last_seen_datetime`) |  |
| 275 | `vcdSyncConnection` | **delete** [vcloud_edge_gateways](/code/tables/vcloud_edge_gateways.md) |  |
| 295 | `vcdSyncConnection` | **update** [vcloud_connections](/code/tables/vcloud_connections.md) (`last_sync_datetime`, `last_sync_status`, `last_sync_message`) |  |

## Calls

[vcdAcceptJson()](/code/functions/vcdAcceptJson.md), [vcdAcceptXml()](/code/functions/vcdAcceptXml.md), [vcdFind()](/code/functions/vcdFind.md), [vcdLoadConnection()](/code/functions/vcdLoadConnection.md), [vcdLogin()](/code/functions/vcdLogin.md), [vcdLogout()](/code/functions/vcdLogout.md), [vcdTryGet()](/code/functions/vcdTryGet.md), [vcdVmRecord()](/code/functions/vcdVmRecord.md), [vcdXml()](/code/functions/vcdXml.md)

## Called from

- [api/assets/vcloud_sync.php](/code/files/api/assets/vcloud_sync.php.md)
- [cron/vcloud_sync.php](/code/files/cron/vcloud_sync.php.md)

## Traps

> [!WARNING]
> **Line 179, in `vcdSyncConnection`:** count what ARRIVED, never page x the size we asked for. The PR stopped when page * 128 >= total, but Director caps a page at its own maximum (restapi.queryservice.maxPageSize, which an admin can lower). On such a system page 1 came back short, the loop stopped, the list counted as complete - and every VM after the first page was deleted.

> [!WARNING]
> **Line 231, in `vcdSyncConnection`:** every page, and remove only after all of them came back. The PR read one page of 128 and then deleted every gateway not on it, so an install with more than 128 lost the rest on every sync.

