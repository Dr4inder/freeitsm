<?php
/**
 * API Endpoint: Upload file attachment to a change
 *
 * ⚠️ SECURITY-CRITICAL, and it was wrong. This endpoint used to accept any file
 * with no validation, keep the caller's own filename, and write it into
 * change-management/attachments/ — a folder Apache serves. Uploading `x.php`
 * and then requesting it over HTTP executed it. Verified, not theorised.
 *
 * Two rules now, and both matter:
 *
 *   1. every byte goes through uploadStoreFile(), which whitelists extension AND
 *      content type, invents its own filename, and drops execution protection
 *      into the directory;
 *   2. the ACCESS CHECK RUNS FIRST. It used to run after move_uploaded_file(),
 *      so an analyst with no rights to a change could still land a file on the
 *      server — the check only stopped the database row, not the write.
 *
 * Downloads already go through get_attachment.php, which authorises. Nothing
 * here is ever meant to be fetched by direct URL.
 */
session_start(['read_and_close' => true]);
require_once '../../config.php';
require_once '../../includes/functions.php';
require_once '../../includes/tenancy.php';
require_once '../../includes/uploads.php';
require_once '../../includes/services/changes.php';

header('Content-Type: application/json');

if (!isset($_SESSION['analyst_id'])) {
    echo json_encode(['success' => false, 'error' => 'Not authenticated']);
    exit;
}
requireModuleAccessJson('changes');
requireModuleWriteJson('changes');   // Read only access (#180) changes nothing here

$analystId = (int)$_SESSION['analyst_id'];
$changeId  = (int)($_POST['change_id'] ?? 0);

if (!$changeId) {
    echo json_encode(['success' => false, 'error' => 'Change ID required']);
    exit;
}

try {
    $conn = connectToDatabase();

    // ⚠️ BEFORE the file is written, not after. Same wording as a missing change
    // so this cannot be used to discover which changes exist.
    if (!analystCanAccessChange($conn, $analystId, $changeId)) {
        echo json_encode(['success' => false, 'error' => 'Change not found']);
        exit;
    }

    if (!isset($_FILES['file'])) {
        echo json_encode(['success' => false, 'error' => 'No file was chosen.']);
        exit;
    }

    $stored = uploadStoreFile(
        $_FILES['file'],
        dirname(dirname(__DIR__)) . '/change-management/attachments/' . $changeId
    );

    // file_path stays relative to the attachments root, as get_attachment.php and
    // delete_attachment.php both expect. It now names OUR generated file; the
    // name the person recognises lives in file_name.
    $relativePath = $changeId . '/' . $stored['stored_name'];
    // The sha256 of the bytes as stored: the evidence export shows it, so anybody can
    // check that the file in the change is the file that was attached (#180).
    $sha256 = @hash_file('sha256', $stored['path']) ?: null;

    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare(
            "INSERT INTO change_attachments
                (change_id, file_name, file_path, file_size, file_type, uploaded_by_id, uploaded_datetime, sha256)
             VALUES (?, ?, ?, ?, ?, ?, UTC_TIMESTAMP(), ?)"
        );
        $stmt->execute([
            $changeId,
            $stored['original_name'],
            $relativePath,
            $stored['size'],
            $stored['mime'],
            $analystId,
            $sha256,
        ]);
        $attachmentId = $conn->lastInsertId();
        ChangesService::auditAttachment($conn, ActorContext::fromSession($conn), $changeId, true, $stored['original_name'], $sha256);
        $conn->commit();
    } catch (Exception $dbEx) {
        if ($conn->inTransaction()) $conn->rollBack();
        // Never leave bytes on disk with no row pointing at them.
        @unlink($stored['path']);
        throw $dbEx;
    }

    echo json_encode([
        'success'       => true,
        'attachment_id' => $attachmentId,
        'message'       => 'File uploaded successfully',
    ]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
