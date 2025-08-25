<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php
include("../config/config.php");
$sql = "SELECT * FROM supply_office";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
    <title>Supply Office</title>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">
            <!--content-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="prmmhlogo.png" alt=""></a>
                </div>

                <div class="tabs-list">
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Edit Data
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php" class="sidebar-link">
                                <i class="uil uil-arrow-left"></i>
                                Back to main dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <div class="main">
            <!-- Top header -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
 
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                            <a href="#" class="theme-toggle">
                                <i class="uil uil-sun"></i>
                                <i class="uil uil-moon"></i>
                            </a>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="loogout.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>

            <main class="content px-5 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Delivery Dashboard</h4>
                    </div>
                    <div class="tab_item card border-0 crud-button" id="tab_items_11">
                        <div class="card-header">
                            <h5 class="card-title">Edit Data</h5>
                        </div>
                        <div class="card-body p-3" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                            <div class="container">
                                <div class="text-center mb-4">
                                    <h3>Edit Delivery Details</h3>
                                    <p>Update delivery details below:</p>

                                    <?php
                                    include('../config/config.php');

                                    // Check if the form has been submitted
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
                                        $transfer_quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
                                        $target_office = isset($_POST['target_office']) ? $_POST['target_office'] : null;

                                        if ($product_id !== null && $transfer_quantity !== null && $target_office !== null) {
                                            // Start transaction to ensure atomicity
                                            mysqli_begin_transaction($conn);

                                            try {
                                                // Step 1: Fetch product details from the Supply Office
                                                $select_sql = "SELECT * FROM supply_office WHERE id = ?";
                                                $stmt = mysqli_prepare($conn, $select_sql);
                                                mysqli_stmt_bind_param($stmt, 'i', $product_id);
                                                mysqli_stmt_execute($stmt);
                                                $result = mysqli_stmt_get_result($stmt);
                                                $product_details = mysqli_fetch_assoc($result);

                                                if (!$product_details) {
                                                    throw new Exception("No product found with the specified ID.");
                                                }

                                                // No update of 'onhand' here, this will be handled upon confirmation by the Pharmacy.

                                                // Step 2: Insert a delivery record into the deliveries table
                                                $insert_delivery_sql = "INSERT INTO deliveries (product_name, product_num, unit_of_issue, batch_num, `exp.date`, unit_value, quantity, balance_on_hand, balance_at_warehouse, approved_quantity, delivery_date, target_office, confirmation_status) 
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, 'Pending')";
                                                    $stmt = mysqli_prepare($conn, $insert_delivery_sql);
                                                    
                                                    // Handle possible NULL values before binding
                                                    $product_name = $product_details['product_name'] ?? '';
                                                    $product_num = $product_details['product_num'] ?? '';
                                                    $unit_of_issue = $product_details['unit_of_issue'] ?? '';
                                                    $batch_num = $product_details['batch_num'] ?? '';
                                                    $exp_date = $product_details['exp.date'] ?? ''; // Use an empty string or a default value if NULL
                                                    $unit_value = $product_details['unit_value'] ?? 0.0; // Use 0 if NULL
                                                    $quantity = $transfer_quantity ?? 0;
                                                    $balance_on_hand = $product_details['onhand'] ?? 0;
                                                    $balance_at_warehouse = $product_details['onhand'] ?? 0;
                                                    $approved_quantity = $transfer_quantity ?? 0;
                                                    $target_office = $target_office ?? '';
                                                    
                                                    // Make sure the number of placeholders matches the variables
                                                    mysqli_stmt_bind_param($stmt, 'sssssdiiiis', 
                                                        $product_name, 
                                                        $product_num, 
                                                        $unit_of_issue, 
                                                        $batch_num, 
                                                        $exp_date, 
                                                        $unit_value, 
                                                        $quantity,  
                                                        $balance_on_hand, 
                                                        $balance_at_warehouse, 
                                                        $approved_quantity, 
                                                        $target_office
                                                    );
                                                                    
                                                mysqli_stmt_execute($stmt);

                                                if (mysqli_stmt_affected_rows($stmt) < 1) {
                                                    throw new Exception("Failed to insert delivery record.");
                                                }

                                                  // Optionally, update the 'delivered' field in the Supply Request table to 'Yes'
                                                    $update_request_sql = "UPDATE supply_requests SET delivered = 'Yes' WHERE product_name = ? AND status = 'Admin Approved'";
                                                    $stmt = mysqli_prepare($conn, $update_request_sql);
                                                    mysqli_stmt_bind_param($stmt, 's', $product_details['product_name']);
                                                    mysqli_stmt_execute($stmt);

                                                    if (mysqli_stmt_affected_rows($stmt) < 1) {
                                                        // Detailed error message
                                                        throw new Exception("Failed to update the request from the Request table: No matching record found for product name " . $product_details['product_name']);
                                                    }

                                                    // Commit the transaction
                                                    mysqli_commit($conn);
                                                    echo "Product successfully delivered to $target_office with status set to 'Pending'.";
                                                } catch (Exception $e) {
                                                    // Rollback the transaction in case of error
                                                    mysqli_rollback($conn);
                                                    echo "Error during transaction: " . $e->getMessage();
                                                }
                                            } else {
                                                echo "Missing product ID, quantity, or target office.";
                                            }
                                        } else if (isset($_GET['id'])) {
                                            // Fetch product details based on the product_id from the GET request
                                            $product_id = $_GET['id'];
                                            $sql = "SELECT * FROM supply_office WHERE id = ?";
                                            $stmt = mysqli_prepare($conn, $sql);
                                            mysqli_stmt_bind_param($stmt, 'i', $product_id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            $product_details = mysqli_fetch_assoc($result);
                                        }
                                        ?>


                                </div>
                            </div>
                        </div>

                        <!-- Render the form if product details are available -->
                        <?php if (!empty($product_details)) : ?>
                        <div class="">
                            <form class="justify-content-start align-items-center" action="" method="post" enctype="multipart/form-data" style="padding-left: 20px; padding-right: 20px;">
                                <input type="hidden" name="product_id" value="<?php echo $product_details['id']; ?>">


                                <div class="col mb-3">
                                    <label class="form-label">Product Image</label>
                                    <div>
                                        <!-- Ensure the path to the image directory is correct -->
                                        <img src="../image/<?php echo $product_details['image_filename']; ?>" alt="Product Image" style="width: 100px; height: auto;">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="col mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $product_details['product_name']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Product Number</label>
                                        <input type="text" class="form-control" name="product_num" value="<?php echo $product_details['product_num']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Unit Of Issue</label>
                                        <input type="text" class="form-control" name="unit_of_issue" value="<?php echo $product_details['unit_of_issue']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Batch Number</label>
                                        <input type="text" class="form-control" name="batch_num" value="<?php echo $product_details['batch_num']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" name="exp_date" value="<?php echo $product_details['exp.date']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Unit Value</label>
                                        <input type="text" class="form-control" name="unit_value" value="<?php echo $product_details['unit_value']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Stock Balance (Supply Office)</label>
                                        <input type="text" class="form-control" name="stock_bal" value="<?php echo $product_details['stock_bal']; ?>" readonly>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Transfer Quantity</label>
                                        <input type="number" name="quantity" min="1" max="<?php echo $product_details['stock_bal']; ?>" required>
                                    </div>

                                    <div class="col mb-3">
                                        <label class="form-label">Target Office</label>
                                        <select name="target_office" id="target_office" required>
                                            <option value="pharmacy">Pharmacy</option>
                                            <option value="laboratory">Laboratory</option>
                                            <option value="central_supply_office">Central Supply Office</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success">Deliver</button>
                                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>President Ramon Magsaysay Memorial Hospital</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="last-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>


</body>

</html>