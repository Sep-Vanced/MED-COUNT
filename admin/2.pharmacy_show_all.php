<?php
include("../config/config.php");

$sql = "SELECT * FROM pharmacy WHERE status != 'Deleted' OR status IS NULL ORDER BY product_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
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
                <a href="1.pharmacy_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="9">No items in inventory</td>
    </tr>
    <?php
}
?>
