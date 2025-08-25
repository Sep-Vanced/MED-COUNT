<?php
include("../config/config.php");

// Assuming the table name is 'delivered_items' and it has columns like 'article_name', 'quantity', etc.
$sql = "SELECT * FROM deliveries WHERE product_name LIKE ? OR quantity LIKE ? OR balance_on_hand LIKE ? OR balance_at_warehouse LIKE ? OR approved_quantity LIKE ? OR delivery_date LIKE ? OR target_office LIKE ? ORDER BY product_name ASC";
$search = isset($_GET['search']) ? $_GET['search'] : '';
$stmt = $conn->prepare($sql);
$searchParam = "%{$search}%";
$stmt->bind_param("sssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

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
            <!-- Add edit and delete links if necessary -->
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
