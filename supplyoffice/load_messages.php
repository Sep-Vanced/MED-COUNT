<?php
include("../config/config.php");

$recipient = $_GET['recipient']; // Get the recipient for the chat
$sender = 'Supply Office'; // Assuming the sender is always 'Supply Office'

// Fetch messages where Supply Office is either the sender or recipient
$sql = "SELECT * FROM messages 
        WHERE (sender = '$sender' AND recipient = '$recipient') 
           OR (sender = '$recipient' AND recipient = '$sender') 
        ORDER BY created_at ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Error: ' . mysqli_error($conn);  // Log error if the query fails
    exit;
}

$messages = '';
$previousDate = ''; // To track the last date displayed

while ($row = mysqli_fetch_assoc($result)) {
    $msg_sender = htmlspecialchars($row['sender']);
    $msg_content = htmlspecialchars($row['message']);
    $created_at = date('H:i:s', strtotime($row['created_at'])); // Get the time
    $messageDate = date('Y-m-d', strtotime($row['created_at'])); // Get the date in 'Y-m-d' format

    // Determine the class for sent or received message
    $message_class = ($msg_sender === 'Supply Office') ? 'sent-message' : 'received-message';

    // Display the date only if it's different from the previous message's date
    if ($messageDate !== $previousDate) {
        $messages .= "<div class='message-date' style='text-align: center;'>{$messageDate}</div>";
        $previousDate = $messageDate;
    }

    // Display the message with the appropriate class without sender's name
    $messages .= "
    <p class='message-item {$message_class}'>
        {$msg_content}
        <span class='message-time'>{$created_at}</span>
    </p>";
}

echo $messages;
?>
