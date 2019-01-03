<?php
session_start();
require_once('fpdf/fpdf.php');
require ("Managers/UserManager.php");
require ("Managers/BooksManager.php");

$user = UserManager::getUser($_SESSION['user_id']);
	
$wishedBooks = BooksManager::getWishedBooks($_SESSION['user_id']);

$pdf = new FPDF();
$pdf->AddPage();


$date = date('Y-m-d H:i:s');
$pdf->SetFont('Times','B',10);
$pdf->Cell(176, 5,"Book date: " . $date, 0, 0, 'R'); 
$pdf->Ln(); 
$pdf->SetFont('Times','B',16);
$pdf->Cell(176, 5, 'My library', 0, 0, 'C'); 
$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 12); 
$pdf->Cell(176, 10, 'This is the list of your books:', 0, 0, 'C');
$pdf->SetFont('Times','B',14);
$pdf->Ln(); 

$pdf->Cell(10,10,"NR.");
$pdf->Cell(100,10,"Title");
$pdf->Cell(50,10,"Author");
$pdf->Cell(100,10,"Book code");

$index = 1;
foreach ($wishedBooks as $book) {
	$pdf->Ln(); 
	$title = $book->book_name;
	$author = $book->book_author;
	$code = $book->book_id;
	$pdf->Cell(10,10,$index);
	$pdf->Cell(100,10,$title);
	$pdf->Cell(50,10,$author);
	$pdf->Cell(100,10,$code);
	$index = $index + 1;
}
$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 8); 
$pdf->Cell(176, 5,'**The reservation is valid for 12 hours',0,0,'R');
	
$pdf->Output();
?>