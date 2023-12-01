<?php
session_start();

// Return a JSON response indicating the session status
header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // If not logged in, return a false status
    echo json_encode(["loggedin" => false]);
    exit;
} else {
    // If logged in, return a true status
    echo json_encode(["loggedin" => true]);
    exit;
}
?>
