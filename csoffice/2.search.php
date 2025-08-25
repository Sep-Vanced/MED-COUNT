<?php
include("../config/config.php");

// Assuming the table name is 'deliveries' and it has columns like 'product_name', 'quantity', 'status', etc.
$sql = "SELECT * FROM deliveries WHERE target_office = 'central_supply_office' AND (product_name LIKE ? OR quantity LIKE ? OR approved_quantity LIKE ? OR delivery_date LIKE ? OR confirmation_status LIKE ?) ORDER BY product_name ASC";
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
        <td colspan="5">No results found</td>
    </tr>
    <?php
}
?>

