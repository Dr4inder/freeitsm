<?php
/**
 * API Endpoint: Get servers list from database
 */
session_start(['read_and_close' => true]);
require_once '../../config.php';
require_once '../../includes/functions.php';
require_once '../../includes/tenancy.php';
require_once '../../includes/services/virtual_estate.php';

header('Content-Type: application/json');

if (!isset($_SESSION['analyst_id'])) {
    echo json_encode(['success' => false, 'error' => 'Not authenticated']);
    exit;
}
requireModuleAccessJson('assets');

try {
    $conn = connectToDatabase();

    $sql = "SELECT id, vm_id, name, power_state, memory_gb, num_cpu, ip_address, hard_disk_size_gb, host, cluster, guest_os, raw_data, DATE_FORMAT(last_synced, '%Y-%m-%d %H:%i:%s') as last_synced FROM servers ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $servers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($servers as &$row) {
        $row['source'] = 'vcenter';
        $row['source_name'] = 'vCenter';
    }
    unset($row);

    // Proxmox VMs and containers, synced by cron/proxmox_sync.php or the Sync button,
    // shaped like the vCenter rows so the table, filters and totals treat them the same.
    // Nodes are hypervisors, not guests, so they are not listed here.
    $pxStmt = $conn->prepare(
        "SELECT v.vmid, v.vm_type, v.connection_id, c.name AS conn_name, v.name, v.status, v.vcpus, v.memory_mb,
                v.disk_gb, v.ip_addresses, v.node_name, v.cluster_name, v.os_type, v.details_json,
                DATE_FORMAT(v.last_seen_datetime, '%Y-%m-%d %H:%i:%s') AS last_seen
         FROM proxmox_vms v JOIN proxmox_connections c ON c.id = v.connection_id
         ORDER BY v.name"
    );
    $pxStmt->execute();
    foreach ($pxStmt->fetchAll(PDO::FETCH_ASSOC) as $v) {
        $servers[] = [
            'id'                  => 'px-' . $v['connection_id'] . '-' . $v['vmid'],
            'vm_id'               => 'proxmox-' . $v['connection_id'] . '-' . $v['vmid'],
            'name'                => (string)$v['name'],
            'power_state'         => $v['status'] === 'running' ? 'active' : 'offline',
            'memory_gb'           => $v['memory_mb'] !== null ? round($v['memory_mb'] / 1024, 2) : 0,
            'num_cpu'             => (int)$v['vcpus'],
            'ip_address'          => $v['ip_addresses'] ? explode(', ', $v['ip_addresses'])[0] : '',
            'hard_disk_size_gb'   => $v['disk_gb'] !== null ? (float)$v['disk_gb'] : 0,
            'host'                => (string)$v['node_name'],
            'cluster'             => (string)$v['cluster_name'],
            'guest_os'            => (string)($v['os_type'] ?? ''),
            'raw_data'            => $v['details_json'],
            'last_synced'         => $v['last_seen'],
            'source'              => 'proxmox',
            'source_name'         => 'Proxmox · ' . $v['conn_name'],
        ];
    }
    // VMware Cloud Director VMs, shaped like the rows above (same table, filters, totals).
    $vcStmt = $conn->prepare(
        "SELECT v.vm_uuid, v.connection_id, c.name AS conn_name, v.name, v.org_vdc, v.status, v.vcpus, v.memory_mb,
                v.disk_gb, v.ip_addresses, v.details_json, DATE_FORMAT(v.last_seen_datetime, '%Y-%m-%d %H:%i:%s') AS last_seen
         FROM vcloud_vms v JOIN vcloud_connections c ON c.id = v.connection_id"
    );
    $vcStmt->execute();
    foreach ($vcStmt->fetchAll(PDO::FETCH_ASSOC) as $v) {
        $servers[] = [
            'id'                  => 'vc-' . $v['connection_id'] . '-' . $v['vm_uuid'],
            'vm_id'               => 'vcloud-' . $v['connection_id'] . '-' . $v['vm_uuid'],
            'name'                => (string)$v['name'],
            'power_state'         => $v['status'] === 'running' ? 'active' : 'offline',
            'memory_gb'           => $v['memory_mb'] !== null ? round($v['memory_mb'] / 1024, 2) : 0,
            'num_cpu'             => (int)$v['vcpus'],
            'ip_address'          => $v['ip_addresses'] ? explode(', ', $v['ip_addresses'])[0] : '',
            'hard_disk_size_gb'   => $v['disk_gb'] !== null ? (float)$v['disk_gb'] : 0,
            'host'                => (string)$v['org_vdc'],
            'cluster'             => (string)$v['org_vdc'],
            'guest_os'            => '',
            'raw_data'            => $v['details_json'],
            'last_synced'         => $v['last_seen'],
            'source'              => 'vcloud',
            'source_name'         => 'vCloud · ' . $v['conn_name'],
        ];
    }
    // Hyper-V (GH #199): pushed by a collector, so no Sync - the panel says when each
    // connection last reported instead. Unlike the three sources above these belong to a
    // company, so they are scoped to the analyst's. A VM not seen, or on a host the last
    // report could not read, is still listed and says so - nothing vanishes for a bad read.
    $hyperv = ['connections' => [], 'clusters' => [], 'hosts' => []];
    if (VirtualEstateService::ready($conn)) {
        $analystId = (int)$_SESSION['analyst_id'];
        [$tf, $ta] = isMultiTenant($conn) ? allAccessibleTenantsFilter($conn, $analystId, 'c.tenant_id') : ['', []];
        $cs = $conn->prepare("SELECT c.* FROM virt_connections c WHERE 1 = 1$tf ORDER BY c.name");
        $cs->execute($ta);
        $connIds = [];
        foreach ($cs->fetchAll(PDO::FETCH_ASSOC) as $c) {
            $connIds[] = (int)$c['id'];
            $hyperv['connections'][] = ['id' => (int)$c['id'], 'name' => $c['name'], 'active' => (bool)$c['is_active'],
                'freshness' => VirtualEstateService::freshness($c), 'last_report_at' => $c['last_report_at'], 'last_observed_at' => $c['last_observed_at'],
                'interval' => (int)$c['expected_interval_minutes'], 'last_outcome' => $c['last_outcome'], 'last_summary' => $c['last_summary']];
        }
        if ($connIds) {
            $in = implode(',', $connIds);
            $names = [];
            foreach ($conn->query("SELECT id, name FROM virt_hosts WHERE connection_id IN ($in)")->fetchAll(PDO::FETCH_KEY_PAIR) as $hid => $hn) { $names[(int)$hid] = $hn; }
            $vms = $conn->query("SELECT v.*, h.name AS host_name, cl.name AS cluster_name, c.name AS conn_name,
                    (SELECT SUM(d.size_bytes) FROM virt_vm_disks d WHERE d.vm_id = v.id) AS disk_bytes
                FROM virt_vms v JOIN virt_connections c ON c.id = v.connection_id
                LEFT JOIN virt_hosts h ON h.id = v.host_id LEFT JOIN virt_clusters cl ON cl.id = v.cluster_id
                WHERE v.connection_id IN ($in)")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($vms as $v) {
                $owners = array_map(fn($id) => $names[(int)$id] ?? ('#' . $id), json_decode((string)$v['possible_owners_json'], true) ?: []);
                $servers[] = [
                    'id'                => 'hv-' . $v['id'],
                    'vm_id'             => 'hyperv-' . $v['connection_id'] . '-' . $v['external_id'],
                    'name'              => (string)$v['name'],
                    'power_state'       => $v['not_seen_since'] === null && strtolower((string)$v['state']) === 'running' ? 'active' : 'offline',
                    'memory_gb'         => $v['memory_bytes'] !== null ? round($v['memory_bytes'] / 1024 ** 3, 2) : 0,
                    'num_cpu'           => (int)$v['cpu_count'],
                    'ip_address'        => $v['guest_addresses'] ? explode(', ', $v['guest_addresses'])[0] : '',
                    'hard_disk_size_gb' => $v['disk_bytes'] !== null ? round($v['disk_bytes'] / 1024 ** 3, 1) : 0,
                    'host'              => (string)$v['host_name'],
                    'cluster'           => (string)$v['cluster_name'],
                    'guest_os'          => (string)($v['os_name'] ?? ''),
                    'raw_data'          => json_encode(['state' => $v['state'], 'highly_available' => $v['is_clustered'] === null ? null : (bool)$v['is_clustered'],
                        'possible_owners' => $owners, 'generation' => $v['generation'] !== null ? (int)$v['generation'] : null, 'vm_id' => $v['external_id'],
                        'first_seen' => $v['first_seen_at'], 'last_observed' => $v['last_seen_observed_at'],
                        'not_seen_since' => $v['not_seen_since'], 'not_confirmed_since' => $v['not_confirmed_since']]),
                    'last_synced'       => $v['last_seen_observed_at'],
                    'source'            => 'hyperv',
                    'source_name'       => 'Hyper-V · ' . $v['conn_name'],
                    'highly_available'  => $v['is_clustered'] === null ? null : (bool)$v['is_clustered'],
                    'not_seen_since'    => $v['not_seen_since'],
                    'not_confirmed_since' => $v['not_confirmed_since'],
                ];
            }
            $hyperv['clusters'] = $conn->query("SELECT cl.id, cl.name, cl.quorum_type, cl.witness, cl.not_seen_since, cl.not_confirmed_since, c.name AS conn_name,
                    (SELECT COUNT(*) FROM virt_hosts h WHERE h.cluster_id = cl.id AND h.not_seen_since IS NULL) AS nodes,
                    (SELECT COUNT(*) FROM virt_vms v WHERE v.cluster_id = cl.id AND v.not_seen_since IS NULL) AS vms
                FROM virt_clusters cl JOIN virt_connections c ON c.id = cl.connection_id WHERE cl.connection_id IN ($in) ORDER BY cl.name")->fetchAll(PDO::FETCH_ASSOC);
            $hyperv['hosts'] = $conn->query("SELECT h.id, h.name, h.node_state, h.identity_kind, h.os_version, h.not_seen_since, h.not_confirmed_since,
                    cl.name AS cluster_name, c.name AS conn_name,
                    (SELECT COUNT(*) FROM virt_vms v WHERE v.host_id = h.id AND v.not_seen_since IS NULL) AS vms
                FROM virt_hosts h JOIN virt_connections c ON c.id = h.connection_id LEFT JOIN virt_clusters cl ON cl.id = h.cluster_id
                WHERE h.connection_id IN ($in) ORDER BY cl.name IS NULL, cl.name, h.name")->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    usort($servers, function ($a, $b) { return strcasecmp((string)$a['name'], (string)$b['name']); });

    // Build summary stats - separate ESXi hosts from VMs
    $esxiHosts = [];
    $vmServers = [];
    foreach ($servers as $s) {
        if ($s['guest_os'] === 'VMware ESXi') {
            $esxiHosts[] = $s;
        } else {
            $vmServers[] = $s;
        }
    }

    $totalVMs = count($vmServers);
    $activeVMs = 0;
    $offlineVMs = 0;
    $totalMemoryGB = 0;
    $totalCPU = 0;
    $totalDiskGB = 0;
    $clusters = [];

    foreach ($vmServers as $s) {
        if ($s['power_state'] === 'active') {
            $activeVMs++;
        } else {
            $offlineVMs++;
        }
        $totalMemoryGB += (float)$s['memory_gb'];
        $totalCPU += (int)$s['num_cpu'];
        $totalDiskGB += (float)$s['hard_disk_size_gb'];
        if (!empty($s['cluster']) && !in_array($s['cluster'], $clusters)) {
            $clusters[] = $s['cluster'];
        }
    }

    $lastSynced = null;
    if ($totalVMs > 0) {
        $lastSynced = $servers[0]['last_synced'];
    }

    echo json_encode([
        'success' => true,
        'servers' => $servers,
        'hyperv' => $hyperv,
        'summary' => [
            'total_vms' => $totalVMs,
            'active_vms' => $activeVMs,
            'offline_vms' => $offlineVMs,
            'total_memory_gb' => round($totalMemoryGB, 1),
            'total_cpu' => $totalCPU,
            'total_disk_gb' => round($totalDiskGB, 1),
            'host_count' => count($esxiHosts),
            'cluster_count' => count($clusters),
            'last_synced' => $lastSynced
        ]
    ]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
