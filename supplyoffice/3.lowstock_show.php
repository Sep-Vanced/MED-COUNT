<?php
include("../config/config.php");

// Fetch items where onhand is less than or equal to 25% of the stock balance
$sql = "SELECT * FROM supply_office WHERE `stock_bal` <= (`onhand` * 0.25) ORDER BY `onhand` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td>
            <img src="../image/<?php echo $row['image_filename']; ?>" alt="" style="width: 40px; height: auto;">
            </td>
            <td>
                <?php echo $row['product_name'] ?>
            </td>
            <td>
                <?php echo $row['product_num'] ?>
            </td>
            <td>
                <?php echo $row['unit_of_issue'] ?>
            </td>
            <td>
                <?php echo $row['batch_num'] ?>
            </td>
            <td>
                <?php echo $row['exp.date'] ?>
            </td>
            <td>
                <?php echo $row['unit_value'] ?>
            </td>
            <td>
                <?php echo $row['onhand'] ?>
            </td>
            <td>
                <?php echo $row['stock_bal'] ?>
            </td>
            <td>
                <a href="1.supply_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
            </td>
            <td>
                <a href="4.deliver.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Deliver</a>
            </td>
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='11'>No low stock items found</td></tr>";
}
?>
