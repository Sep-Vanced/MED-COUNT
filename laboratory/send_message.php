<?php
include("../config/config.php"); // Include database configuration

// Get the sender, message, and recipient from the POST request
$sender = $_POST['sender'];
$message = $_POST['message'];
$recipient = $_POST['recipient'];

// Check if the required fields are present
if (empty($sender) || empty($message) || empty($recipient)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

// Insert the new message into the database
$query = "INSERT INTO messages (sender, message, recipient, created_at) VALUES ('$sender', '$message', '$recipient', NOW())";
if (mysqli_query($conn, $query)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]); // Include error message for debugging
}
?>
