<?php
session_start();
//include connection file 
include "inc/connect.php";
include_once('pdf/fpdf.php');
$username = $_SESSION["username"];

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        //$this->Image('https://i2.wp.com/tutorialswebsite.com/wp-content/uploads/2016/01/cropped-LOGO-1.png',10,10,50);
        $this->SetFont('Arial','B',13);
        // Move the title position
        $this->Cell(10);
        // Title
        $this->Cell(0,0,'APPOINTMENT LIST',0,0,'C');

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
    
$display_heading = array('date'=>'Date', 'start_time'=> 'Start Time', 'end_time'=> 'End Time','name'=> 'Student Name');

$result = mysqli_query($conn, "SELECT date, start_time, end_time, student.name as name FROM appointment INNER JOIN schedule on schedule.scheduleId = appointment.scheduleId INNER JOIN student ON student.susername = appointment.susername WHERE schedule.tusername = '$username' AND MONTH(schedule.date) = MONTH(now()) AND YEAR(schedule.date) = YEAR(now()) ORDER BY date ASC") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM schedule WHERE FIELD != 'scheduleId' AND FIELD != 'status' AND FIELD != 'tusername'");
$header2 = "No";
$header3 = "Student Name";

$result_name = mysqli_query($conn, "SELECT name FROM teacher WHERE tusername = '$username'") or die("database error:". mysqli_error($conn));


$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',14);
$i = 1;

//Display teacher name
$pdf->Cell(40,10, 'Teacher Name: ',10,10,'C');
foreach($result_name as $row)
{
    foreach($row as $column)
    $pdf->Cell(150,-10,$column,10,10,'C');
}

//Display month of the appointment list
$get_month = date('M');
$pdf->Cell(20,30, 'Month: ',10,10,'C');
$pdf->Cell(90,-30,$get_month,10,10,'C');

// Line break
$pdf->Ln(30);

//Display No
$pdf->Cell(15,10,($header2),1);

foreach($header as $heading) //Display Date|Start Time|End Time
{
    $pdf->Cell(40,10,$display_heading[$heading['Field']],1);
}
//Display Name
$pdf->Cell(40,10,($header3),1);

//Display data
foreach($result as $row) 
{
    $pdf->SetFont('Arial','',10);
    $pdf->Ln();
    //Display No
    $pdf->Cell(15,9,($i++),1);
    //Display date, start time, end time, student name
    foreach($row as $column)
    $pdf->Cell(40,9,$column,1);
}
$pdf->Output();
?>