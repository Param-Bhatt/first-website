<?php
    include('fpdf library 1.81/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $txt = "Hello ".$_POST['user'];
    echo $text; 
    $pdf->Cell(40,10,$txt);
    $pdf->output();
?>