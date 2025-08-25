<?php
include("../config/config.php");

// Assuming the table name is 'supply_requests' and it has columns like 'product_name', 'requested_quantity', 'unit_of_issue', 'requested_date', 'status', etc.
$sql = "SELECT * FROM pharmacy WHERE status = 'deleted' AND (product_name LIKE ? OR product_num LIKE ? OR unit_of_issue LIKE ? OR batch_num LIKE ? OR `exp.date` LIKE ?) ORDER BY product_name ASC";
$search = isset($_GET['search']) ? $_GET['search'] : '';
$stmt = $conn->prepare($sql);
$searchParam = "%{$search}%";
$stmt->bind_param("sssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

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
        <td colspan="6">No results found</td>
    </tr>
    <?php
}
?>
