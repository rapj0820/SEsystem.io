<?php
require('../../fpdf184/fpdf.php');
require('../../conn.php');
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',8);
        // Title
        $this->Cell(0,5,'Appendix 73           Page '.$this->PageNo().' of {nb}',0,0,'R');
        $this->Ln();
        $this->SetFont('Arial','B',13);
        $this->Cell(0,0,'INVENTORY REPORT',0,0,'C');
        
        
        // $this->Ln();
        $this->Ln(7);
        $this->SetFont('Arial','',9);
        $this->Cell(0,0,$_GET['lm'],0,0,'C');
        // Line break
        $this->Ln(3);
        $this->Cell(310,50,'','T',0,'L');
        $this->Ln(5);

        date_default_timezone_set("Asia/Manila");
        $this->Cell(145,0,'As at',0,0,'R');
        // $this->Cell(15,0,'As at ',0,0,'C');
        $this->SetFont('Arial','UB',9);
        $this->Cell(0,0,'  '.date("F j, Y").'   ',0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Ln(5);

        $this->Cell(20,6,'Fund Cluster:',0,0,'L');
        $this->Cell(100,6,'','B',0,'L');
        $this->Ln(6);
        $this->Cell(20,6,'For Which:',0,0,'L');
        $this->Cell(270,5,'JOSEFINA S. DE PERALTA, ED. D., SECONDARY SCHOOL PRINCIPAL IV, SAN ESTEBAN NATIONAL HIGH SCHOOL is accountable, having assumed such accountability on','B',0,'L');
        $this->Ln(10);
        $cw = array(50,60,30,25,20,20,25,25,15,20,20);
        //TABLE HEADER
        
        $this->SetFont('Arial','B',9);
        $this->SetFillColor(232, 232, 232);
        $this->Cell($cw[0],6,'','TRL',0,'C', 1);
        $this->Cell($cw[1],6,'','TRL',0,'C', 1);
        $this->Cell($cw[2],6,'Property','TLR',0,'C', 1);
        $this->Cell($cw[3],6,'','T',0,'C', 1);
        $this->Cell($cw[4]+$cw[5],6,'Unit of','TLR',0,'C', 1);
        $this->Cell($cw[6]+$cw[7],6,'Quantity per','TLR',0,'C', 1);
        $this->Cell($cw[8]+$cw[9],6,'Shortage/Overtage',1,0,'C', 1);
        $this->Cell($cw[10],6,'','TR',0,'C', 1);
        $this->Ln();
        $this->Cell($cw[0],6,'Article','BLR',0,'C', 1);
        $this->Cell($cw[1],6,'Description','BRL',0,'C', 1);
        $this->Cell($cw[2],6,'Number','BLR',0,'C', 1);
        // $this->SetFillColor(255, 255, 255);
        $this->Cell($cw[3],6,'Date Acquired','B',0,'C', 1);
        $this->Cell($cw[4],6,'Measure',1,0,'C', 1);
        $this->Cell($cw[5],6,'Value',1,0,'C', 1);
        $this->Cell($cw[6],6,'Property Card',1,0,'C', 1);
        $this->Cell($cw[7],6,'Physical Count',1,0,'C', 1);
        $this->Cell($cw[8],6,'Qty',1,0,'C', 1);
        $this->Cell($cw[9],6,'Value',1,0,'C', 1);
        $this->Cell($cw[10],6,'Remarks','BR',0,'C', 1);
        $this->Ln();
    }

    function Content($lm)
    {
        $cw = array(50,60,30,25,20,20,25,25,15,20,20);
        $this->SetFont('Arial','',9);
        // Content
        include('../../conn.php');
        $sql="SELECT * FROM learning_materials WHERE materialtype = '$lm'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)) {
                $this->Cell($cw[0],6,$row['lm_article'],1,0,'C', false);
                $this->Cell($cw[1],6,$row['lm_description'],1,0,'C', false);
                $this->Cell($cw[2],6,$row['lm_propnum'],1,0,'C', false);
                $this->Cell($cw[3],6,$row['lm_aquire'],1,0,'C', false);
                $this->Cell($cw[4],6,$row['lm_unitm'],1,0,'C', false);
                $this->Cell($cw[5],6,$row['lm_unitv'],1,0,'C', false);
                $this->Cell($cw[6],6,$row['lm_q_propertycard'],1,0,'C', false);
                $this->Cell($cw[7],6,$row['lm_q_physical'],1,0,'C', false);
                $this->Cell($cw[8],6,$row['lm_so_quantity'],1,0,'C', false);
                $this->Cell($cw[9],6,$row['lm_so_value'],1,0,'C', false);
                $this->Cell($cw[10],6,$row['lm_remark'],1,0,'C', false);
                $this->Ln();
            }
            
        }
        

    }
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('Landscape', array(215.9,330.2));
$pdf->Content($_GET['lm']);

// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>
?>