<?php
include("../config/config.php");

$sender = $_POST['sender']; // Identify who is sending the message
$message = $_POST['message'];
$recipient = 'Supply Office'; // Specify the recipient for messages from pharmacy

// Insert the new message into the database
$query = "INSERT INTO messages (sender, message, recipient) VALUES ('$sender', '$message', '$recipient')";
if (mysqli_query($conn, $query)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]); // Include error message for debugging
}
?>
