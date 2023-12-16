<?php
require "../library/tcpdf.php";
class Generatereport
{

    public static function Tsales()
    {
        include "../controller/config.php";
        // Fetch data from the database using the modified query
        $sql = "SELECT
    products.id,
    orders.order_id,
    orders.user_id,
    orders_details.Date,
    orders_details.total
FROM products
JOIN order_product_details ON products.id = order_product_details.product_id
JOIN orders_details ON order_product_details.order_id = orders_details.order_id
JOIN orders ON orders.order_id = orders_details.order_id;";

        $result = $conn->query($sql);

        // Initialize TCPDF
        $pdf = new TCPDF('P', 'mm', 'A3');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        // Set font for the header
        $pdf->SetFont('helvetica', 'B', 16);

        // Output the header
        $pdf->Cell(190, 10, "PureFitness Sales Report", 0, 1, 'C');

        // Set font back to regular
        $pdf->SetFont('helvetica', '', 12);
        $totalSales = 0;

        // Output table headers
        $pdf->Cell(30, 10, "ID", 1);
        $pdf->Cell(50, 10, "Order_ID", 1);
        $pdf->Cell(50, 10, "User_ID", 1);
        $pdf->Cell(50, 10, "Date", 1);
        $pdf->Cell(30, 10, "Total", 1);
        $pdf->Ln(); // Move to the next line

        // Output data from the database
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30, 10, $row['id'], 1);
            $pdf->Cell(50, 10, $row['order_id'], 1);
            $pdf->Cell(50, 10, $row['user_id'], 1);
            $pdf->Cell(50, 10, $row['Date'], 1);
            $pdf->Cell(30, 10, $row['total'], 1);
            $pdf->Ln(); // Move to the next line
            $totalSales += $row['total'];
        }

        $pdf->SetFont('helvetica', 'B', 16);

        // Output the header
        //add line here chatgpt

        $pdf->Cell(210, 10, "Total Sales =  " . $totalSales, 1, 2, 'C');  // Added the sixth parameter

        // Set font back to regular
        $pdf->SetFont('helvetica', '', 12);

        // Close the database connection
        $conn->close();

        // Output PDF
        $pdf->Output();
    }
    public static function Msales($month)
    {
        include "../controller/config.php";

        $selectedMonth =$month;
        // Fetch data from the database using the modified query
        $sql = "SELECT
    products.id,
    orders.order_id,
    orders.user_id,
    orders_details.Date,
    orders_details.total
FROM products
JOIN order_product_details ON products.id = order_product_details.product_id
JOIN orders_details ON order_product_details.order_id = orders_details.order_id
JOIN orders ON orders.order_id = orders_details.order_id
WHERE MONTH(orders_details.Date) = $selectedMonth;";

        $result = $conn->query($sql);

        // Initialize TCPDF
        $pdf = new TCPDF('P', 'mm', 'A3');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        // Set font for the header
        $pdf->SetFont('helvetica', 'B', 16);

        // Output the header
        $pdf->Cell(190, 10, "PureFitness Sales Report", 0, 1, 'C');

        // Set font back to regular
        $pdf->SetFont('helvetica', '', 12);
        $totalSales = 0;

        // Output table headers
        $pdf->Cell(30, 10, "ID", 1);
        $pdf->Cell(50, 10, "Order_ID", 1);
        $pdf->Cell(50, 10, "User_ID", 1);
        $pdf->Cell(50, 10, "Date", 1);
        $pdf->Cell(30, 10, "Total", 1);
        $pdf->Ln(); // Move to the next line

        // Output data from the database
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30, 10, $row['id'], 1);
            $pdf->Cell(50, 10, $row['order_id'], 1);
            $pdf->Cell(50, 10, $row['user_id'], 1);
            $pdf->Cell(50, 10, $row['Date'], 1);
            $pdf->Cell(30, 10, $row['total'], 1);
            $pdf->Ln(); // Move to the next line
            $totalSales += $row['total'];
        }

        $pdf->SetFont('helvetica', 'B', 16);

        // Output the header
        $pdf->Cell(210, 10, "Total Sales =  " . $totalSales, 1, 2, 'C');  // Added the sixth parameter

        // Set font back to regular
        $pdf->SetFont('helvetica', '', 12);

        // Close the database connection
        $conn->close();

        // Output PDF
        $pdf->Output();
    }
    public static function Qsales($q)
    {
        include "../controller/config.php";
        $selectedQuarter = $q;
        
// Fetch data from the database using the modified query
$sql = "SELECT
    products.id,
    orders.order_id,
    orders.user_id,
    orders_details.Date,
    orders_details.total
FROM products
JOIN order_product_details ON products.id = order_product_details.product_id
JOIN orders_details ON order_product_details.order_id = orders_details.order_id
JOIN orders ON orders.order_id = orders_details.order_id
WHERE QUARTER(orders_details.Date) = $selectedQuarter;";

$result = $conn->query($sql);

// Initialize TCPDF
$pdf = new TCPDF('P', 'mm', 'A3');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Set font for the header
$pdf->SetFont('helvetica', 'B', 16);

// Output the header
$pdf->Cell(190, 10, "PureFitness Sales Report", 0, 1, 'C');

// Set font back to regular
$pdf->SetFont('helvetica', '', 12);
$totalSales = 0;

// Output table headers
$pdf->Cell(30, 10, "ID", 1);
$pdf->Cell(50, 10, "Order_ID", 1);
$pdf->Cell(50, 10, "User_ID", 1);
$pdf->Cell(50, 10, "Date", 1);
$pdf->Cell(30, 10, "Total", 1);
$pdf->Ln(); // Move to the next line

// Output data from the database
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['order_id'], 1);
    $pdf->Cell(50, 10, $row['user_id'], 1);
    $pdf->Cell(50, 10, $row['Date'], 1);
    $pdf->Cell(30, 10, $row['total'], 1);
    $pdf->Ln(); // Move to the next line
    $totalSales += $row['total'];
}

$pdf->SetFont('helvetica', 'B', 16);

// Output the header
$pdf->Cell(210, 10, "Total Sales =  ".$totalSales, 1, 2, 'C');  // Added the sixth parameter

// Set font back to regular
$pdf->SetFont('helvetica', '', 12);

// Close the database connection
$conn->close();

// Output PDF
$pdf->Output();
    }
    public static function Ysales($y)
    {
        include "../controller/config.php";
        $selectedYear = $y;
        
// Fetch data from the database using the modified query
$sql = "SELECT
    products.id,
    orders.order_id,
    orders.user_id,
    orders_details.Date,
    orders_details.total
FROM products
JOIN order_product_details ON products.id = order_product_details.product_id
JOIN orders_details ON order_product_details.order_id = orders_details.order_id
JOIN orders ON orders.order_id = orders_details.order_id
WHERE YEAR(orders_details.Date) = $selectedYear;";

$result = $conn->query($sql);

// Initialize TCPDF
$pdf = new TCPDF('P', 'mm', 'A3');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Set font for the header
$pdf->SetFont('helvetica', 'B', 16);

// Output the header
$pdf->Cell(190, 10, "PureFitness Sales Report", 0, 1, 'C');

// Set font back to regular
$pdf->SetFont('helvetica', '', 12);
$totalSales = 0;

// Output table headers
$pdf->Cell(30, 10, "ID", 1);
$pdf->Cell(50, 10, "Order_ID", 1);
$pdf->Cell(50, 10, "User_ID", 1);
$pdf->Cell(50, 10, "Date", 1);
$pdf->Cell(30, 10, "Total", 1);
$pdf->Ln(); // Move to the next line

// Output data from the database
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['order_id'], 1);
    $pdf->Cell(50, 10, $row['user_id'], 1);
    $pdf->Cell(50, 10, $row['Date'], 1);
    $pdf->Cell(30, 10, $row['total'], 1);
    $pdf->Ln(); // Move to the next line
    $totalSales += $row['total'];
}

$pdf->SetFont('helvetica', 'B', 16);

// Output the header
$pdf->Cell(210, 10, "Total Sales =  ".$totalSales, 1, 2, 'C');  // Added the sixth parameter

// Set font back to regular
$pdf->SetFont('helvetica', '', 12);

// Close the database connection
$conn->close();

// Output PDF
$pdf->Output();
    }
}
