<?php

require_once( "fpdf/fpdf.php" );
require_once( "config.php" );
require_once( "session.php" );

// Begin configuration

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportDate = "Date :-  " . date('d-m-Y');
$reportDateYPos = 6;
$logoFile = "img/logo.jpg";
$logoXPos = 100;
$logoYPos = 0;
$logoWidth = 110;

$columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
$rowLabels = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );



$data = array(
        array( 9940, 10100, 9490, 11730 ),
      array( 19310, 21140, 20560, 22590 ),
    array( 25110, 26260, 25210, 28370 ),
  array( 27650, 24550, 30040, 31980 ),
);

// End configuration


/* Create the page */

$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->AddPage();

// Logo
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

/* Report Frequency, Date, Contractor name */
$pdf->SetFont( 'Arial', '', 13 );
$pdf->Cell(50,10,'Report Frequency :- '.' Daily ',0,0,'L');
$pdf->Ln( 7 );
$pdf->Cell( 50, 10, $reportDate, 0, 0, 'L' );
$pdf->Ln( 7 );
$pdf->Cell(50,10,'Contractor :- '. 'Pukemapu Services',0,0,'L');
$pdf->Line(0,37,210,37);
$pdf->Ln( 17 );

/* Main Contents
Fetching data from mysql database according to query passed */
//////////////////////////////////////////////////

if(isset($_POST['today']))
  {
  $cname = $_POST['cont']; //UPPER CASE
  $contn = strtolower(str_replace(' ','_',$cname));  // LOWER CASE
  $wrktb = $contn . "_wrk";  //Work database
  $tdate = date('Y-m-d');    // Current date
  
    $sql = "SELECT DISTINCT crw_no FROM $wrktb ORDER BY crw_no";
    $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
   
    while($row = mysqli_fetch_assoc($result) )
    {
       $crw[] = $row['crw_no'];
    }
    $count = count($crw);
    
    // Display Records
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    $pdf->SetFont( 'Arial', '', 12 );
    //
           $pdf->Cell( 17, 8,'Emp Id', 0, 0, 'C');
           $pdf->Cell( 38, 8, 'First Name', 0, 0, 'C');
           $pdf->Cell( 21, 8, 'last Name',0 , 0, 'C');
           $pdf->Cell( 24, 8, 'Start',0 , 0, 'C');
           $pdf->Cell( 24, 8, 'Finish', 0, 0, 'C');
           //$pdf->Cell( 25, 8, $row1['f_time'], 0, 0, 'C');
           $pdf->Cell( 16, 8, 'Lunch',0 , 0, 'C');
           $pdf->Cell( 26, 8, 'Job',0 , 0, 'C');
           $pdf->Cell( 30, 8, 'Hours', 0, 0, 'C');
           $pdf->Ln( 10 );
           $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
           $pdf->SetFont( 'Arial', '', 10 );
    for($i=0;$i<$count;$i++)
    {
    
    $sql1 = "SELECT * FROM $wrktb WHERE t_date = CURDATE() AND crw_no = $i+1";
    $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
        while($row1 = mysqli_fetch_assoc($result1) )
        {
           
           $s_time = date("g:i a", strtotime($row1["s_time"]));
           $f_time = date("g:i a", strtotime($row1["f_time"]));
           $pdf->Cell( 17, 8, $row1['e_id'], 0, 0, 'C');
           $pdf->Cell( 38, 8, $row1['f_name'], 0, 0, 'C');
           $pdf->Cell( 21, 8, $row1['l_name'], 0, 0, 'C');
           $pdf->Cell( 24, 8, $s_time, 0, 0, 'C');
           $pdf->Cell( 24, 8, $f_time, 0, 0, 'C');
           //$pdf->Cell( 25, 8, $row1['f_time'], 0, 0, 'C');
           $pdf->Cell( 16, 8, $row1['n_lunch'], 0, 0, 'C');
           $pdf->Cell( 26, 8, $row1['j_code'], 0, 0, 'C');
           $pdf->Cell( 30, 8, $row1['t_hrs'], 0, 0, 'C');
           $pdf->Ln( 5 );
           

           /*?></td><td ><?php echo $row1['e_id'];
           ?></td><td><?php echo $row1['f_name'];         
           ?></td><td><?php echo $row1['l_name'];
           ?></td><td><?php 
           $s-time = date("g:i a", strtotime($row1["s_time"]));
           ?></td><td><?php
           echo date("g:i a", strtotime($row1["f_time"]));
           ?></td><td><?php echo $row1['n_lunch'];
           ?></td><td><?php echo $row1['j_code'];
           ?></td><td><?php echo $row1['t_hrs'];
           ?></td></tr><?php*/

        }

    
    }           
 


    
}


// For Week








////////////////////////////////////////////////////

/*$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );

//$pdf->SetFont( 'Arial', '', 17 );


//$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );

$pdf->SetFont( 'Arial', '', 13 );



$pdf->Write( 19, $reportDate );

$pdf->Ln( 16 );

$pdf->SetFont( 'Arial', '', 12 );

$pdf->Write( 6, "Despite the economic downturn, WidgetCo had a strong year. Sales of the HyperWidget in particular exceeded expectations. The fourth quarter was generally the 
best performing; this was most likely due to our increased ad spend in Q3." );

$pdf->Ln( 12 );

$pdf->Write( 6, "2010 is expected to see increased sales growth as we expand into other countries." );


/**
  Create the table
**/
/*
$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont( 'Arial', 'I', 15 );

// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );
$pdf->Cell( 46, 12, " PRODUCT", 1, 0, 'L', true);

// Remaining header cells
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=0; $i<count($columnLabels); $i++ ) {
  $pdf->Cell( 36, 12, $columnLabels[$i], 1, 0, 'C', true );
}

$pdf->Ln( 12 );

// Create the table data rows

$fill = false;
$row = 0;

foreach ( $data as $dataRow ) {

  // Create the left header cell
  $pdf->SetFont( 'Arial', 'B', 15 );
  $pdf->SetTextColor( $tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2] );
  $pdf->SetFillColor( $tableHeaderLeftFillColour[0], $tableHeaderLeftFillColour[1], $tableHeaderLeftFillColour[2] );
  $pdf->Cell( 46, 12, " " . $rowLabels[$row], 1, 0, 'L', $fill );

  // Create the data cells
  $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
  $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
  $pdf->SetFont( 'Arial', '', 15 );

  for ( $i=0; $i<count($columnLabels); $i++ ) {
    $pdf->Cell( 36, 12, ( '$' . number_format( $dataRow[$i] ) ), 1, 0, 'C', $fill );
  }

  $row++;
  $fill = !$fill;
  $pdf->Ln( 12 );
}





/* Serve the PDF */

$pdf->Output( "report.pdf", "I" );

?>
