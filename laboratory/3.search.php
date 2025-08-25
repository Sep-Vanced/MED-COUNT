<?php
include("../config/config.php");

// Assuming the table name is 'supply_requests' and it has columns like 'product_name', 'requested_quantity', 'unit_of_issue', 'requested_date', 'status', etc.
$sql = "SELECT * FROM supply_requests WHERE types = 'laboratory' AND status = 'rejected' AND (product_name LIKE ? OR requested_quantity LIKE ? OR unit_of_issue LIKE ? OR request_date LIKE ?) ORDER BY product_name ASC";
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
            <td><?php echo $row['requested_quantity']; ?></td>
            <td><?php echo $row['unit_of_issue']; ?></td>
            <td><?php echo $row['request_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
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
