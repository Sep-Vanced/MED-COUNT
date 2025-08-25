<?php
include("../config/config.php");

$sql = "SELECT * FROM deliveries WHERE target_office = 'central_supply_office' ORDER BY product_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['approved_quantity']; ?></td>
            <td><?php echo $row['delivery_date']; ?></td>
            <td><?php echo $row['confirmation_status']; ?></td>
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
