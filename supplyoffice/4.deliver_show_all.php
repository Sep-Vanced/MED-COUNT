<?php
include("../config/config.php");

$sql = "SELECT * FROM deliveries ORDER BY delivery_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['balance_on_hand']; ?></td>
            <td><?php echo $row['balance_at_warehouse']; ?></td>
            <td><?php echo $row['approved_quantity']; ?></td>
            <td><?php echo $row['delivery_date']; ?></td>
            <td><?php echo $row['target_office']; ?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="7">No results found</td>
    </tr>
    <?php
}
?>