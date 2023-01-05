<?php
include('vendor/autoload.php');
require('init.php');
use App\Card;
use App\FPDF;
$card = new Card('');
$card->setConnection($connection);
if(isset($_GET['card_set'])){ 
$cards = $card->exportSet($_GET['card_set']);
}
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'QuizIt!',1);
$pdf->Ln(20);
$pdf->Cell(50,10,'Set Name: ' . $cards[0]['name'],0,1);
$pdf->Ln(20);
$pdf->SetFont('Arial','',13);
foreach ($cards as $card){
$pdf->Ln(5);
$pdf->SetFillColor(164,219,232); 
$pdf->SetFont('Arial','B',13);
$pdf->Cell(180,8,'Title: ' . $card['title'],0,0,0,true);
$pdf->Ln(10);
$pdf->SetFont('Arial','',13);
$pdf->Cell(50,10,'Description: ' . $card['description'],0,1);
$pdf->Ln(5);
}
$pdf->Output(); ?>