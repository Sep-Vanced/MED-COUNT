<?php
include("../config/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $deliveryId = $_POST['id'];

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // Fetch the delivery details
        $delivery_sql = "SELECT * FROM deliveries WHERE id = ?";
        $stmt = mysqli_prepare($conn, $delivery_sql);
        mysqli_stmt_bind_param($stmt, 'i', $deliveryId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $delivery_details = mysqli_fetch_assoc($result);

        if (!$delivery_details) {
            throw new Exception("No delivery found with the specified ID.");
        }

        // Step 1: Update the confirmation status to 'Delivered'
        $update_status_sql = "UPDATE deliveries SET confirmation_status = 'Delivered' WHERE id = ?";
        $stmt = mysqli_prepare($conn, $update_status_sql);
        mysqli_stmt_bind_param($stmt, 'i', $deliveryId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) < 1) {
            throw new Exception("Failed to update delivery status.");
        }

            // Handle possible NULL values before binding
            $product_name = $delivery_details['product_name'] ?? '';
            $product_num = $delivery_details['product_num'] ?? '';
            $unit_of_issue = $delivery_details['unit_of_issue'] ?? ''; // Use an empty string if NULL
            $batch_num = $delivery_details['batch_num'] ?? ''; // Use an empty string if NULL
            $exp_date = $delivery_details['exp.date'] ?? ''; // Use an empty string if NULL
            $unit_value = $delivery_details['unit_value'] ?? 0; // Use 0 if NULL
            $quantity = $delivery_details['quantity']; // Assuming quantity is always set

            // Step 2: Add the product to the pharmacy's inventory
            $insert_laboratory_sql = "INSERT INTO laboratory (product_name, product_num, unit_of_issue, batch_num, `exp.date`, unit_value, onhand, stock_bal) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert_laboratory_sql);
            mysqli_stmt_bind_param($stmt, 'sssssiii', 
                $product_name, 
                $product_num, 
                $unit_of_issue, 
                $batch_num, 
                $exp_date, 
                $unit_value, 
                $quantity,  // Add the delivered quantity to the pharmacy
                $quantity   // Set the stock balance in the pharmacy to the delivered quantity
            );
            mysqli_stmt_execute($stmt);


        if (mysqli_stmt_affected_rows($stmt) < 1) {
            throw new Exception("Failed to add product to the laboratory inventory.");
        }

        

        if (mysqli_stmt_affected_rows($stmt) < 1) {
            throw new Exception("Failed to add product to the pharmacy inventory.");
        }

        // Decrease the stock balance in the supply office inventory
        $decrease_supply_sql = "UPDATE supply_office SET stock_bal = stock_bal - ? WHERE product_name = ?";
        $stmt = mysqli_prepare($conn, $decrease_supply_sql);
        mysqli_stmt_bind_param($stmt, 'is', $delivery_details['quantity'], $delivery_details['product_name']);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) < 1) {
            throw new Exception("Failed to update supply office stock balance.");
        }

        // Commit the transaction
        mysqli_commit($conn);
        echo 'success';
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        mysqli_rollback($conn);
        echo "error: " . $e->getMessage();
    }
}
?>
