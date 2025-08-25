<?php
include("../config/config.php");

$recipient = $_POST['recipient'];

// Update the status of unread messages for the given recipient to mark them as read
$query = "UPDATE messages SET status = 1 
          WHERE sender = '$recipient' AND recipient = 'Supply Office' AND status = 0";
mysqli_query($conn, $query);
?>
