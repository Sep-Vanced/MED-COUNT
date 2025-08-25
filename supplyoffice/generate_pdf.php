<?php
// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Delivered Items');
$pdf->SetSubject('Delivered Items List');
$pdf->SetKeywords('TCPDF, PDF, delivered, items, report');

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
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 6);

    // HTML content to be included in PDF
$html = '
    <table border="1" cellpadding="3" cellspacing="0" style="width: 100%;">
        <thead>
            <h2 style="text-align: center;">REQUISITION AND ISSUE SLIP</h2>
            <h4 style="text-align: center;">______________________________________________</h4>
            <h3 style="text-align: center;">LGU</h3>
        </thead>

            <tbody>
                <tr cellpadding="5px">
                    <td> DIVISION: ______________ <br> OFFICE: ________________</td>
                    <td> RESPONSIBILITY CENTER <br> CODE: ________________ </td>
                    <td> RIS NUMBER: ____________ <br> DATE: ___________________ </td>
                </tr>
   
        <thead>
            <tr style="border: 0;">
                <td>REQUISITION</td>
                <td>ISSUANCE</td>
            </tr>
        </thead>
            </tbody>
            <tr>
                <th style="width: 10%; text-align: center;"><strong>STOCK NO.</strong></th>
                <th style="width: 8%; text-align: center;"><strong>UNIT</strong></th>
                <th style="width: 40%; text-align: center;"><strong>DESCRIPTION</strong></th>
                <th style="width: 13%; text-align: center;"><strong>UNIT PRICE</strong></th>
                <th style="width: 8%; text-align: center;"><strong>QTY</strong></th>
                <th style="width: 8%; text-align: center;"><strong>QTY</strong></th>
                <th style="width: 13%; text-align: center;"><strong>REMARKS</strong></th>
            </tr>
        <tbody>';


// Fetch data from the database
include("../config/config.php");

$delivered_sql = "SELECT *, DATE_FORMAT(delivery_date, '%Y-%m-%d %H:%i') as formatted_date FROM deliveries ORDER BY delivery_date DESC";
$delivered_result = mysqli_query($conn, $delivered_sql);

// Check if the query returned any rows
// Check if any records were found
if ($delivered_result && mysqli_num_rows($delivered_result) > 0) {
    while ($row = mysqli_fetch_assoc($delivered_result)) {
        $html .= '
        <tr>
            <td style="width: 10%; text-align: center;">' . htmlspecialchars($row['id']) . '</td>
            <td style="width: 8%; text-align: center;">' . htmlspecialchars($row['unit_of_issue']) . '</td>
            <td style="width: 40%; text-align: left;">' . htmlspecialchars($row['product_name']) . '</td>
            <td style="width: 13%; text-align: center;">' . htmlspecialchars($row['unit_value']) . '</td>
            <td style="width: 8%; text-align: center;">' . htmlspecialchars($row['quantity']) . '</td>
            <td style="width: 8%; text-align: center;">' . htmlspecialchars($row['approved_quantity']) . '</td>
            <td style="width: 13%; text-align: center;">' . htmlspecialchars($row['product_num']) . '</td>
        </tr>';
    }
} else {
    $html .= '<tr><td colspan="7" style="text-align: center;">No delivered items found</td></tr>';
}

$html .= '
    </tbody>
</table>

<br><br>
<table border="1.5px" style="width: 100%;">
    <tr>
        <td> PURPOSE: 
        <br>
        <br>
        </td>
    </tr>
    <tr>
        <td style="width: 40%; text-align: left; cellpadding: 3px;">
        REQUESTED BY: 
        <br>
        <br>
        <br>
        SIGNATURE: 
        <br>
        <br>
        <br>
        PRINTED NAME:  
        <br> 
        DESIGNATION: 
        <br>
        <br>
        DATE: 
        <br>

        </td>

        <td style="width: 20%; text-align: left;">APPROVED BY:</td>

        <td style="width: 20%; text-align: left;">ISSUED BY:</td>

        <td style="width: 20%; text-align: left;">RECEIVED BY:</td>
    </tr>

</table>
';

// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('delivered_items.pdf', 'D'); // 'D' forces download
?>