<?php
include("../config/config.php");

$message = $_POST['message'];
$sender = $_POST['sender'];
$recipient = $_POST['recipient']; 

// Insert the new message with status 0 (unread)
$sql = "INSERT INTO messages (message, sender, recipient, status) VALUES ('$message', '$sender', '$recipient', 0)";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
}
?>
