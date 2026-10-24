<?php
/**
 * API: System → Integrations → Zabbix. Administrators only.
 *
 *   GET  ?action=get     settings, the lookups the form needs, the endpoint address,
 *                        the token, and the last 25 events received
 *   POST {action:'save', ...}    the settings - see zabbixSaveSettings()
 *   POST {action:'rotate'}       a new token; the old one stops working at once
 *
 * The token is returned in full because the administrator has to paste it into
 * Zabbix. It is encrypted at rest (ENCRYPTED_SETTING_KEYS).
 */
session_start(['read_and_close' => true]);
require_once '../../config.php';
require_once '../../includes/functions.php';
require_once '../../includes/admin_api_guard.php';   // administrators only
require_once '../../includes/public_url.php';
require_once '../../includes/integrations/zabbix.php';

header('Content-Type: application/json');

try {
    $conn = connectToDatabase();
    $in = json_decode(file_get_contents('php://input'), true) ?: [];
    $action = (string)($in['action'] ?? $_GET['action'] ?? 'get');

    if ($action === 'save') {
        csrfRequireWriteMethod();
        zabbixSaveSettings($conn, $in);
        echo json_encode(['success' => true]);
        exit;
    }
    if ($action === 'rotate') {
        csrfRequireWriteMethod();
        echo json_encode(['success' => true, 'token' => zabbixRotateToken($conn)]);
        exit;
    }
    if ($action !== 'get') {
        echo json_encode(['success' => false, 'error' => 'Unknown action']);
        exit;
    }

    $events = [];
    if (zabbixReady($conn)) {
        $events = $conn->query("SELECT e.id, e.problem_id, e.event_value, e.host, e.trigger_name, e.severity, e.ticket_id,
                                       e.action, e.detail, e.received_datetime, t.ticket_number
                                  FROM zabbix_events e LEFT JOIN tickets t ON t.id = e.ticket_id
                                 ORDER BY e.id DESC LIMIT 25")->fetchAll(PDO::FETCH_ASSOC);
    }
    $multi = isMultiTenant($conn);
    echo json_encode([
        'success'    => true,
        'ready'      => zabbixReady($conn),
        'settings'   => zabbixSettings($conn),
        'token'      => zabbixToken($conn),
        'endpoint'   => publicAbsoluteUrl($conn, 'api/external/zabbix/alert.php'),
        'severities' => ZABBIX_SEVERITIES,
        'priorities' => $conn->query("SELECT id, name FROM ticket_priorities WHERE is_active = 1 ORDER BY display_order, id")->fetchAll(PDO::FETCH_ASSOC),
        'statuses'   => $conn->query("SELECT id, name, is_closed FROM ticket_statuses WHERE is_active = 1 ORDER BY display_order, id")->fetchAll(PDO::FETCH_ASSOC),
        'teams'      => $conn->query("SELECT id, name FROM teams WHERE COALESCE(is_active, 1) = 1 ORDER BY name")->fetchAll(PDO::FETCH_ASSOC),
        'origins'    => $conn->query("SELECT id, name FROM ticket_origins WHERE COALESCE(is_active, 1) = 1 ORDER BY display_order, name")->fetchAll(PDO::FETCH_ASSOC),
        'companies'  => $multi ? $conn->query("SELECT id, name FROM tenants ORDER BY name")->fetchAll(PDO::FETCH_ASSOC) : [],
        'events'     => $events,
    ]);
} catch (InvalidArgumentException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} catch (Exception $e) {
    error_log('zabbix_settings: ' . $e->getMessage());
    echo json_encode(['success' => false, 'error' => 'Could not load or save the Zabbix settings.']);
}
