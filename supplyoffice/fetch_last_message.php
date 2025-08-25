<?php
include("../config/config.php");

// Get the current date
$current_date = date('Y-m-d');

// Fetch the earliest message for each recipient on the current day
$query = "SELECT sender AS recipient, MIN(created_at) as first_message_time 
          FROM messages 
          WHERE recipient = 'Supply Office' 
          AND DATE(created_at) = '$current_date' 
          GROUP BY sender 
          ORDER BY first_message_time ASC";

$result = mysqli_query($conn, $query);

$conversations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $conversations[] = $row;
}

// Return the data as JSON
echo json_encode($conversations);
?>
