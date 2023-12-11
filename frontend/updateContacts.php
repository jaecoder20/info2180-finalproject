<?php
session_start();
require_once '../database/config.php';

header('Content-Type: application/json');

$response = ['message' => 'Action failed.'];

if (isset($_POST['email'], $_POST['action'])) {
    $email = $_POST['email'];
    $action = $_POST['action'];
    $userId = $_SESSION['id']; 

    if ($action === 'assign') {
        $stmt = $link->prepare("UPDATE Contacts SET assigned_to = ?, updated_at = NOW() WHERE email = ?");
        $stmt->bind_param("is", $userId, $email);
        if ($stmt->execute()) {
            $response['message'] = 'Contact assigned successfully.';
        } else {
            $response['message'] = 'Failed to assign contact.';
        }
    } elseif ($action === 'switchRole') {
        $selectStmt = $link->prepare("SELECT type FROM Contacts WHERE email = ?");
        $selectStmt->bind_param("s", $email);
        if ($selectStmt->execute()) {
            $result = $selectStmt->get_result();
            $currentType = $result->fetch_assoc()['type'];
            $newType = $currentType === 'Sales Lead' ? 'SUPPORT' : 'SALES LEAD';

            $updateStmt = $link->prepare("UPDATE Contacts SET type = ?, updated_at = NOW() WHERE email = ?");
            $updateStmt->bind_param("ss", $newType, $email);
            if ($updateStmt->execute()) {
                $response['message'] = 'Contact type updated successfully.';
                $response['newType'] = $newType;
            } else {
                $response['message'] = 'Failed to update contact type.';
            }
            $updateStmt->close();
        } else {
            $response['message'] = 'Failed to retrieve current contact type.';
        }
        $selectStmt->close();
    }
}

echo json_encode($response);
?>
