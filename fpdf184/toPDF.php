<?php
require('./fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Times','',13);
    // Framed title
    $this->Cell(0,0,'PROVINCE OF LA UNION',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,0,'MUNICIPALITY OF BAUANG',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,0,'BARANGAY PARINGAO',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,0,'PUROK --',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,0,'CENSUS FOR 2022',0,0,'C');
    
    // Line break
    $this->Ln(20);
}
// Colored table
function FancyTable()
{
    // Colors, line width and bold font
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(97, 97);
    $i_w = array(97, 97);
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    $this->Cell($w[0],6,'Total Population','TL',0,'L',$fill);
    $this->Cell($w[1],6,'625',1,0,'L',$fill);
    $this->Ln();
    // $this->Cell(15);
    $this->Cell($i_w[0],6,'          Male','L',0,'L',$fill);
    $this->Cell($i_w[1],6,'320',1,0,'L',$fill);
    $this->Ln();
    // $this->Cell(15);
    $this->Cell($i_w[0],6,'          Female','L',0,'L',$fill);
    $this->Cell($i_w[1],6,'320',1,0,'L',$fill);
    $this->Ln();
    $fill = !$fill;
    // foreach($data as $row)
    // {
    //     $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
    //     $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
    //     $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
    //     $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
    //     $this->Ln();
    //     $fill = !$fill;
    // }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}
$pdf=new PDF();
$pdf->AddPage('Portrait', array(215.9,330.2));
$pdf->FancyTable();
$pdf->Output();

?>