<?php
//include connection file 
if(isset($_GET['generate_view_reg_students_pdf'])){

    $exam_id =$_GET['generate_view_reg_students_pdf'];
         

      }

include "includes/bangladb.php";
include_once('pdf/fpdf.php');
 

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('https://i2.wp.com/tutorialswebsite.com/wp-content/uploads/2016/01/cropped-LOGO-1.png',10,10,50);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
    // Line break
    $this->Ln(20);
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
 
$display_heading = array('u_id'=>'ID', 'u_name'=> 'Name', 'u_email'=> 'Email','u_phn'=> 'Phone','u_pass'=> 'Password','u_college'=> 'College','u_city'=> 'Address','u_image'=> 'Image','u_fb'=> 'FB','reg_time'=> 'Registration ON');
 
$result = mysqli_query($con, "select * from users") or die("database error:". mysqli_error($con));
$header = mysqli_query($con, "SHOW columns FROM users ");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
foreach($header as $heading) {
$pdf->Cell(35,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(35,10,$column,1);
}
$pdf->Output();
?>