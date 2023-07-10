<?php
include('conn.php');
include('session.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// Create a new PhpSpreadsheet Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set the active sheet
$sheet = $spreadsheet->getActiveSheet();

// Set the column headers
$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'Model#');
$sheet->setCellValue('C1', 'Chassis#');
$sheet->setCellValue('D1', 'Variant');
$sheet->setCellValue('E1', 'Color');
$sheet->setCellValue('F1', 'Price');

// Fetch the table data from the database
$query = "SELECT * FROM `tblmastervehicle` WHERE isDeleted='0'";
$result = mysqli_query($conn, $query);

$row = 2;
while ($fetch = mysqli_fetch_object($result)) {
    $sheet->setCellValue('A' . $row, $fetch->vehicleId);
    $sheet->setCellValue('B' . $row, $fetch->modalNo);
    $sheet->setCellValue('C' . $row, $fetch->chassisNo);
    $sheet->setCellValue('D' . $row, $fetch->variant);
    $sheet->setCellValue('E' . $row, $fetch->color);
    $sheet->setCellValue('F' . $row, $fetch->price);
    $row++;
}
// Set the filename for the Excel file
$filename = 'customer_data_' . date('YmdHis') . '.xlsx';

// Create a new PhpSpreadsheet Writer object
$writer = new Xlsx($spreadsheet);

$tempFilePath = 'path/to/temp/directory/' . $filename;
$writer->save($tempFilePath);

// Set the headers to trigger the file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($tempFilePath));
header('Cache-Control: max-age=0');
header('Expires: 0');
header('Pragma: public');

// Output the file contents to the browser
readfile($tempFilePath);

// Remove the temporary file
unlink($tempFilePath);
exit;








