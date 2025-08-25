<?php
include("../config/config.php");

// Initialize an array to hold the unread counts
$unreadCounts = [
    'Pharmacy' => 0,
    'Laboratory' => 0,
    'Central Supply Room' => 0
];

// Query to get the count of unread messages for each sender to the Supply Office
$query = "SELECT sender, COUNT(*) AS unread_count 
          FROM messages 
          WHERE recipient = 'Supply Office' AND status = 0
          AND sender IN ('Pharmacy', 'Laboratory', 'Central Supply Room')
          GROUP BY sender";

$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sender = $row['sender'];
        $unreadCounts[$sender] = $row['unread_count'];
    }
}

// Return the counts as JSON
echo json_encode($unreadCounts);
?>
