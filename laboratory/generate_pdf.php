<?php
// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Used Items');
$pdf->SetSubject('Used Items List');
$pdf->SetKeywords('TCPDF, PDF, used, items, report');

// Disable default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default header data
$pdf->SetHeaderData('');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin();
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 6);

// Retrieve form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$itemSelect = isset($_POST['itemSelect']) ? $_POST['itemSelect'] : '';

// Include database connection
include("../config/config.php");

// Fetch unit and unit price for the selected item
$item_sql = "SELECT unit_of_issue, unit_value FROM used_items WHERE product_name = '" . mysqli_real_escape_string($conn, $itemSelect) . "' LIMIT 1";
$item_result = mysqli_query($conn, $item_sql);

$unit = '__________';
$unit_price = '__________';

if ($item_result && mysqli_num_rows($item_result) > 0) {
    $item_data = mysqli_fetch_assoc($item_result);
    $unit = $item_data['unit_of_issue']; // This is the Unit
    $unit_price = $item_data['unit_value']; // This is the Unit Price
}

// Add the name and description to the PDF
$html = '
<table style="width: 100%; border-collapse: collapse;">
<h1 style="text-align: center;">SUPPLIES LEDGER CARD</h1>
    <tr>
        <td style="text-align: left; width: 50%;"><h3>NAME: ' . htmlspecialchars($name) . '</h3></td>
        <td style="text-align: right; width: 50%;"><h3>UNIT: ' . htmlspecialchars($unit) . '</h3></td>
    </tr>
    <tr>
        <td style="text-align: left; width: 50%;"><h3>DESCRIPTION: ' . htmlspecialchars($description) . '</h3></td>
        <td style="text-align: right; width: 50%;"><h3>UNIT PRICE: ' . htmlspecialchars($unit_price) . '</h3></td>
    </tr>
</table>

    <table border="1" cellpadding="3" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 15%; text-align: center;"><strong>DATE ISSUED</strong></th>
                <th style="width: 40%; text-align: center;"><strong>FROM WHOM RECEIVE/TO WHOM ISSUED</strong></th>
                <th style="width: 10%; text-align: center;"><strong>DEBITS</strong></th>
                <th style="width: 10%; text-align: center;"><strong>CREDITS</strong></th>
                <th style="width: 15%; text-align: center;"><strong>BALANCES</strong></th>
                <th style="width: 10%; text-align: center;"><strong>UNIT PRICE</strong></th>
            </tr>
        </thead>
        <tbody>';

// Modify the SQL to filter by the selected item
$used_sql = "SELECT *, DATE_FORMAT(used_date, '%Y-%m-%d %H:%i') as formatted_date 
             FROM used_items 
             WHERE user = 'laboratory' AND product_name = '" . mysqli_real_escape_string($conn, $itemSelect) . "' 
             ORDER BY used_date DESC";
$used_result = mysqli_query($conn, $used_sql);

// Check if any records were found
if ($used_result && mysqli_num_rows($used_result) > 0) {
    while ($row = mysqli_fetch_assoc($used_result)) {

        // Calculate the balance
        $balance = $row['onhand'] - $row['used_quantity'];

        $html .= '
        <tr>
            <td style="width: 15%; text-align: center;">' . htmlspecialchars($row['used_date']) . '</td>
            <td style="width: 40%; text-align: center;">' . htmlspecialchars($row['issued']) . '</td>
            <td style="width: 10%; text-align: center;">' . htmlspecialchars($row['stock_bal']) . '</td>
            <td style="width: 10%; text-align: center;">' . htmlspecialchars($row['used_quantity']) . '</td>
            <td style="width: 15%; text-align: center;">' . htmlspecialchars($balance) . '</td>
            <td style="width: 10%; text-align: center;">' . htmlspecialchars($row['unit_value']) . '</td>
        </tr>';
    }
} else {
    $html .= '<tr><td colspan="6" style="text-align: center;">No used items found</td></tr>';
}

$html .= '
    </tbody>
</table>
';

// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('SuppliesLedgerCard.pdf', 'I'); // 'D' forces download
?>
