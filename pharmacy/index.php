<?php
session_start();
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="message.css">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="app.js"></script>
    <title>Pharmacy</title>
</head>

<body>
    <div class="wrapper">

        <!-- sidebar -->
        <aside id="sidebar">
            <!--content-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="prmmhlogo.png" alt=""></a>
                </div>

                <div class="tabs-list">
                    <ul class="sidebar-nav nav-pills">
                        <li class="sidebar-item test_3 active" data-tc="tab_items_9">
                            <a href="javascript:void(0);" onclick="resetWebsite(event)" class="sidebar-link">
                                <i class="uil uil-list-ul pe-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <!--First main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed hover-me" id="v-pills-home-tab" data-toggle="pill"
                                data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                                <i class="uil uil-file folder-open"></i>
                                Inventory
                            </a>
                            <ul id="pages" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_1">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Pharmacy</a>
                                </li>
                            </ul>
                        </li>
                        <!--Second main side Menu-->
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#request" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-atom"></i>
                                Request
                            </a>
                            <ul id="request" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_2">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Pharmacy</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_7">
                                    <a class="sidebar-link"><i class="uil uil-envelope"> </i>Follow up</a>
                                </li>
                            </ul>
                        </li>
                        <!--Third main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#report" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-book-open"></i>
                                Reports
                            </a>
                            <ul id="report" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_8">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Requested</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_3">
                                    <a class="sidebar-link"><i class="uil uil-truck"> </i>Delivered</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_4">
                                    <a class="sidebar-link"><i class="uil uil-x"> </i>Rejected</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_5">
                                    <a class="sidebar-link"><i class="uil uil-redo"> </i>Used Items</a>
                                </li>
                            </ul>
                        </li>
                        <!--Fourth main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#recycle" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-trash-alt"></i>
                                Recycle Bin
                            </a>
                            <ul id="recycle" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_6">
                                    <a class="sidebar-link"><i class="uil uil-trash"> </i>Recycle Bin</a>
                                </li>
                            </ul>
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
                        <a href="#" class="theme-toggle pl-3">
                            <i class="uil uil-sun"></i>
                            <i class="uil uil-moon"></i>
                        </a>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="loogout.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                    </div>

                    <!-- miming box areas -->
                    <div class="tab_item row" id="tab_items_9">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                            <h4>Welcome Back,
                                                <?php echo $_SESSION['user_fullname']; ?>
                                            </h4>
                                                <p class="mb-0">How's your day?</p>
                                            </div>
                                        </div>
                                        <div class="col-6 alig-self-end text-end">
                                            <img src="doctor.jpg" class="img-fluid illustration-img rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h1 id="current-time-1">
                                                12:00:00
                                            </h1>
                                            <div class="qoutes">
                                                <h4 id="current-date-1"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Supply Office-->
                    <div class="tab_item card border-0" id="tab_1" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Pharmacy Inventory
                                <a href="1.pharmacy_add.php" class="btn btn-primary">New Item</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="searchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="showAllBtn" class="btn btn-secondary">Show All</button>
                                                <button type="button" id="nearExpiryBtn" class="btn btn-warning">Near Expiry</button>
                                                <button type="button" id="lowStockBtn" class="btn btn-danger">Low Stock</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="pharmacyTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Product Number</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Batch Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Unit Value</th>
                                        <th scope="col">OnHand</th>
                                        <th scope="col">Stock Balance</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Use</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT * FROM pharmacy WHERE status != 'Deleted' OR status IS NULL ORDER BY product_name ASC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><img src="../image/<?php echo $row['image_filename']; ?>" alt="" style="width: 40px; height: auto;"></td> <!-- Adjust path as needed -->
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['product_num'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['batch_num'] ?></td>
                                                <td><?php echo $row['exp.date'] ?></td>
                                                <td><?php echo $row['unit_value'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['stock_bal'] ?></td>
                                                <td>
                                                    <a href="1.pharmacy_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a href="use_item.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Use</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab_item card border-0" id="tab_2" style="display: none;">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between fs-3">
                            Request
                        </h5>
                    </div>
                    <div class="card-body p-3" style="height: 800px;">
                        <div class="container">
                            <div class="text-center mb-4">
                                <h3>Request for new Item</h3>
                                <p>Complete the Form below to request a new item</p>
                                <?php
                                    include("../config/config.php"); // Ensure the path is correct

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_request'])) {
                                        $requested_quantities = $_POST['requested_quantity'];
                                        $unit_of_issues = $_POST['unit_of_issue'];
                                        $product_names = $_POST['product_name'];
                                        $all_inserts_successful = true;

                                        for ($i = 0; $i < count($product_names); $i++) {
                                            $requested_quantity = mysqli_real_escape_string($conn, $requested_quantities[$i]);
                                            $unit_of_issue = mysqli_real_escape_string($conn, $unit_of_issues[$i]);
                                            $product_name = mysqli_real_escape_string($conn, $product_names[$i]);

                                            $insert_request_query = "INSERT INTO supply_requests (requested_quantity, unit_of_issue, product_name, types) 
                                                                    VALUES ('$requested_quantity', '$unit_of_issue', '$product_name', 'pharmacy')";

                                                if (!mysqli_query($conn, $insert_request_query)) {
                                                    $all_inserts_successful = false;
                                                    break; // Stop the loop if an insert fails
                                                }
                                            }
                                            if ($all_inserts_successful) {
                                                echo '<div class="alert alert-success" role="alert">Requests sent successfully.</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">Error sending requests. Please try again.</div>';
                                            }
                                        }
                                    
                                    ?>

                            </div>
                        </div>

                        <div class="container mt-5"> 
                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="items" class="d-flex flex-column align-items-center">
                                    <div class="row mb-3 item w-100">
                                        <div class="col-md-4">
                                            <label for="productName" class="form-label">Articles</label>
                                            <input list="product_suggestions" class="form-control" name="product_name[]" required autocomplete="off">
                                            <datalist id="product_suggestions"></datalist>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unitOfIssue" class="form-label">Unit</label>
                                            <input type="text" class="form-control" name="unit_of_issue[]" required autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="requested_quantity[]" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <!-- Button row outside and below the 'items' div -->
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-primary mx-2" onclick="addMore()">Add More</button>
                                        <button type="button" class="btn btn-danger mx-2" onclick="removeLast()">Remove Last</button>
                                        <button type="submit" name="submit_request" class="btn btn-success mx-2">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Follow Up Section -->
                <div class="tab_item card border-0" id="tab_7" style="display: none;">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between fs-3">Follow up your request</h5>
                    </div>
                    <div class="card-body">
                        <!-- Message Container -->
                        <div class="message-container">
                        <div class="d-flex align-items-center mb-3 message-header">
                            <i class="uil uil-user-circle me-2"></i>
                            <span>SUPPLY OFFICE</span>
                        </div>

                        
                            <!-- Chat Messages Area -->
                            <div id="chat-messages" class="message-body">
                                <!-- Messages will be loaded here via AJAX -->
                            </div>

                            <!-- Chat Input Area -->
                            <div class="input-group mb-3 chat-input">
                                <input type="text" id="message-input" class="form-control" placeholder="Type here...">
                                <button id="send-btn" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include the script for real-time messaging -->
                <script src="message.js"></script>
                    <!--Pharmacy Request-->
                    <div class="tab_item card border-0" id="tab_8" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Requested
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="pharmacySearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="pharmacyShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="pharmacySupplyTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Balance on hand</th>
                                        <th scope="col">Balance at warehouse</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Request Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE types ='pharmacy' AND delivered != 'Yes' AND status IN ('Approved', 'Pending', 'Admin Approved') 
                                    AND status != 'Rejected' ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['warehouse'] ?></td>
                                                <td><?php echo $row['approvedqty'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    <!-- Delivered Items Tab for Supply Office -->
                    <div class="tab_item card border-0" id="tab_3" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Delivered Items
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Search Form -->
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="deliveredSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="deliveredShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                                                <!-- Delivered Items Table -->
                            <table id="deliveredTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">Delivered Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");

                                    // SQL query to fetch delivered items
                                    $delivered_sql = "SELECT *, DATE_FORMAT(delivery_date, '%Y-%m-%d %H:%i') as formatted_date FROM deliveries WHERE target_office = 'pharmacy' ORDER BY delivery_date DESC";
                                    $delivered_result = mysqli_query($conn, $delivered_sql);

                                    // Check if the query returned any rows
                                    if ($delivered_result && $delivered_result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($delivered_result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['approved_quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['formatted_date']); ?></td>
                                                <td>
                                                    <?php 
                                                        if ($row['confirmation_status'] == 'Pending') {
                                                            echo '<button class="btn btn-warning confirm-btn" data-id="'.$row['id'].'">Pending</button>';
                                                        } else {
                                                            echo 'Delivered';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>    
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="5">No delivered items found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   <!--Rejected-->
                   <div class="tab_item card border-0" id="tab_4" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                            Rejected Requests
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="rejectedSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="rejectedShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="rejectedTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE status = 'Rejected' AND types = 'pharmacy' ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                    
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>
                                                <td><?php echo $row['status']?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 

                    <div class="tab_item card border-0" id="tab_5" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Used Items
                                <!-- Download PDF Button -->
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pdfModal">Download PDF</a>

                                    <!-- Modal for PDF Details -->
                                    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel">Enter PDF Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="pdfForm" action="generate_pdf.php" method="POST" target="_blank">
                                            <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="description" name="description" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="itemSelect" class="form-label">Select Item</label>
                                                <select class="form-select" id="itemSelect" name="itemSelect" required>
                                                <option value="">Choose an item...</option>
                                                <?php
                                                    $items_sql = "SELECT DISTINCT product_name FROM used_items WHERE user = 'pharmacy'";
                                                    $items_result = mysqli_query($conn, $items_sql);
                                                    while ($item_row = mysqli_fetch_assoc($items_result)) {
                                                    echo "<option value='" . htmlspecialchars($item_row['product_name']) . "'>" . htmlspecialchars($item_row['product_name']) . "</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Generate PDF</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Search Form -->
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="usedSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="usedShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Used Items Table -->
                            <table id="usedTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Used Quantity</th>
                                    <th scope="col">Unit of Issue</th>
                                    <th scope="col">Used Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include("../config/config.php");

                                    // SQL query to fetch used items
                                    $used_sql = "SELECT product_name, used_quantity, unit_of_issue, DATE_FORMAT(used_date, '%Y-%m-%d %H:%i') as formatted_date FROM used_items WHERE user = 'pharmacy' ORDER BY used_date DESC";
                                    $used_result = mysqli_query($conn, $used_sql);

                                    // Check if the query returned any rows
                                    if ($used_result && $used_result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($used_result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['used_quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['unit_of_issue']); ?></td>
                                                <td><?php echo htmlspecialchars($row['formatted_date']); ?></td>
                                            </tr>    
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">No used items found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!-- Supply Recycle Bin-->
                    <div class="tab_item card border-0" id="tab_6" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Supply Recycle Bin
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="supplyRecycleBinSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="supply_search" class="input-group-text">Search:</label>
                                                <input type="text" id="supply_search" name="supply_search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="supplyRecycleBinShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="supplyRecycleBinTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Article</th>
                                        <th scope="col">Product Number</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Batch Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");

                                    $sql = "SELECT * FROM pharmacy WHERE status = 'Deleted'";

                                    if (!empty($_GET['search'])) {
                                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                                        $sql .= " AND (product_name LIKE '%$search%' OR product_num LIKE '%$search%' OR batch_num LIKE '%$search%')";
                                    }

                                    $result = mysqli_query($conn, $sql);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['product_num']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['unit_of_issue']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['batch_num']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['exp.date']) . "</td>";
                                            echo '<td><a href="4.sup_restore.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-success">Restore</a> <a href="4.sup_delete_forever.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger">Permanently Delete</a></td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No items in the recycle bin</td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
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