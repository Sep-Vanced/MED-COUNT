<?php
include("../config/config.php");

$sql = "SELECT * FROM supply_requests WHERE types = 'central_supply_office' AND status = 'rejected' ORDER BY product_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['requested_quantity']; ?></td>
            <td><?php echo $row['unit_of_issue']; ?></td>
            <td><?php echo $row['request_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="5">No items in inventory</td>
    </tr>
    <?php
}
?>
