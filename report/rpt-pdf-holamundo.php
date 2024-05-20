<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/appweb/config/global.php");
require(ROOT_CORE.'/fpdf186/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->Output();
?>