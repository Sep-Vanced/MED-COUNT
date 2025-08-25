<?php
include("../config/config.php"); // Include database configuration

// Get the recipient from the request
$recipient = isset($_GET['recipient']) ? $_GET['recipient'] : '';
$sender = 'Laboratory'; // Set the sender for the laboratory page

// Check if the recipient is specified
if (empty($recipient)) {
    echo json_encode(['status' => 'error', 'message' => 'Recipient not specified']);
    exit;
}

// Fetch messages between Laboratory and Supply Office
$query = "SELECT * FROM messages 
          WHERE (sender = '$sender' AND recipient = '$recipient') 
             OR (sender = '$recipient' AND recipient = '$sender') 
          ORDER BY created_at ASC";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    exit;
}

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'sender' => htmlspecialchars($row['sender']),
        'content' => htmlspecialchars($row['message']),
        'date' => date('Y-m-d', strtotime($row['created_at'])),
        'time' => date('H:i:s', strtotime($row['created_at']))
    ];
}

// Return messages as JSON
echo json_encode(['status' => 'success', 'messages' => $messages]);
?>
