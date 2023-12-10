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
    }
    $stmt->close();
}

echo json_encode($response);
?>
