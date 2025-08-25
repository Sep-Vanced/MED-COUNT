<?php
include("../config/config.php");

$sql = "SELECT * FROM central_supply_office WHERE status = 'deleted' ORDER BY product_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['product_num'];?></td>
            <td><?php echo $row['unit_of_issue'];?></td>
            <td><?php echo $row['batch_num'];?></td>
            <td><?php echo $row['exp.date'];?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="6">No items in inventory</td>
    </tr>
    <?php
}
?>
