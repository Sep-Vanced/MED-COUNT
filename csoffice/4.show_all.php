<?php
include("../config/config.php");

$sql = "SELECT * FROM used_items WHERE user = 'central_supply_office' ORDER BY product_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['used_quantity']; ?></td>
            <td><?php echo $row['unit_of_issue']; ?></td>
            <td><?php echo $row['used_date']; ?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="4">No items in inventory</td>
    </tr>
    <?php
}
?>
