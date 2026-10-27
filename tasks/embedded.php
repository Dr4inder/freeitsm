<?php
/**
 * A linked task's own editor, for the ticket workspace's Work tab (PR #212, by
 * @Dr4inder). Loaded in a same-origin frame by assets/js/ticket-workspace.js.
 *
 * This is NOT a second task editor. It checks the frame's context, then runs the
 * real tasks/index.php with $taskEmbedContext set, which leaves out the board,
 * the header and the phone controls and loads assets/js/task-embed-bridge.js.
 * Every field still saves through the normal Tasks endpoints and their checks.
 *
 * GET: task (the task linked to the ticket), ticket_id.
 *
 * 404 rather than 403 when the context is wrong, so the frame never confirms that
 * someone else's task exists. Needs BOTH modules: the ticket's, to be in the
 * workspace at all, and Tasks, to edit what is in it.
 *
 * @wiki Tasks-on-Tickets-Developer-Guide
 */
session_start();
require_once '../config.php';
require_once '../includes/functions.php';
require_once '../includes/tenancy.php';
require_once '../includes/task_embed.php';
requireModuleAccess('tickets');
requireModuleAccess('tasks');

$taskId   = filter_var($_GET['task'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$ticketId = filter_var($_GET['ticket_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
try {
    // The frame always opens on the linked task itself, so it is its own root.
    if (!$taskId || !$ticketId || !taskEmbedCanOpen(connectToDatabase(), (int)$_SESSION['analyst_id'], $taskId, $taskId, $ticketId)) {
        http_response_code(404);
        exit;
    }
} catch (Throwable $e) {
    http_response_code(503);
    exit;
}

// Read by tasks/index.php: its presence is what makes the page embedded.
$taskEmbedContext = ['taskId' => $taskId, 'ticketId' => $ticketId];
require __DIR__ . '/index.php';
