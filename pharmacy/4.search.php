<?php
include("../config/config.php");

// Assuming the table name is 'supply_requests' and it has columns like 'product_name', 'requested_quantity', 'unit_of_issue', 'requested_date', 'status', etc.
$sql = "SELECT * FROM used_items WHERE user = 'pharmacy' AND (product_name LIKE ? OR used_quantity LIKE ? OR unit_of_issue LIKE ? OR used_date LIKE ?) ORDER BY product_name ASC";
$search = isset($_GET['search']) ? $_GET['search'] : '';
$stmt = $conn->prepare($sql);
$searchParam = "%{$search}%";
$stmt->bind_param("ssss", $searchParam, $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

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
        <td colspan="4">No results found</td>
    </tr>
    <?php
}
?>
