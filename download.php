<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory; // 이 줄 추가

function downloadResult($workername) {
    $spreadsheet = IOFactory::load('smple.xlsx');

    // Assuming the 'result' tab is the fourth tab
    $sheet = $spreadsheet->getSheet(4);
    
    $host = "event-price.com";
    $db = "links";
    $user = "dbuser";
    $pass = "asdfqwerty@1234*";
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // 1차 평가 결과 가져오기
    $sql = "SELECT id, workername, rater, rate1, rate2, rate3, rate4, rate5, rate6, rate7, rate8, rate9, rate10, longtextt FROM insaresult WHERE workername = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$workername]);

    // Start filling from row 2 (cell B2)
    $rowCount = 2;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sheet->setCellValue('B' . $rowCount, $row['id']);
        $sheet->setCellValue('C' . $rowCount, $row['workername']);
        $sheet->setCellValue('D' . $rowCount, $row['rater']);
        $sheet->setCellValue('E' . $rowCount, $row['rate1']);
        $sheet->setCellValue('F' . $rowCount, $row['rate2']);
        $sheet->setCellValue('G' . $rowCount, $row['rate3']);
        $sheet->setCellValue('H' . $rowCount, $row['rate4']);
        $sheet->setCellValue('I' . $rowCount, $row['rate5']);
        $sheet->setCellValue('J' . $rowCount, $row['rate6']);
        $sheet->setCellValue('K' . $rowCount, $row['rate7']);
        $sheet->setCellValue('L' . $rowCount, $row['rate8']);
        $sheet->setCellValue('M' . $rowCount, $row['rate9']);
        $sheet->setCellValue('N' . $rowCount, $row['rate10']);
        $sheet->setCellValue('O' . $rowCount, str_replace("\n", " ", $row['longtextt']));
        $sheet->getStyle('O' . $rowCount)->getAlignment()->setWrapText(true);
        $rowCount++;
    }

    // 2차 평가 결과 가져오기
    $sql = "SELECT id, workername, rater, rate1, rate2, rate3, rate4, rate5, rate6, rate7, rate8, rate9, rate10, longtextt FROM insaresult2 WHERE workername = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$workername]);

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sheet->setCellValue('B' . $rowCount, $row['id']);
        $sheet->setCellValue('C' . $rowCount, $row['workername']);
        $sheet->setCellValue('D' . $rowCount, $row['rater']);
        $sheet->setCellValue('E' . $rowCount, $row['rate1']);
        $sheet->setCellValue('F' . $rowCount, $row['rate2']);
        $sheet->setCellValue('G' . $rowCount, $row['rate3']);
        $sheet->setCellValue('H' . $rowCount, $row['rate4']);
        $sheet->setCellValue('I' . $rowCount, $row['rate5']);
        $sheet->setCellValue('J' . $rowCount, $row['rate6']);
        $sheet->setCellValue('K' . $rowCount, $row['rate7']);
        $sheet->setCellValue('L' . $rowCount, $row['rate8']);
        $sheet->setCellValue('M' . $rowCount, $row['rate9']);
        $sheet->setCellValue('N' . $rowCount, $row['rate10']);
        $sheet->setCellValue('O' . $rowCount, str_replace("\n", " ", $row['longtextt']));
        $sheet->getStyle('O' . $rowCount)->getAlignment()->setWrapText(true);
        $rowCount++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'result.xlsx';
    $writer->save($fileName);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileName));
    flush(); 
    readfile($fileName);
    exit;
}

if (isset($_GET['workername'])) {
    downloadResult($_GET['workername']);
}
?>
