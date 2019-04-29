<?php
require_once( "fpdf/fpdf.php" );
require_once( "config.php" );
require_once( "session.php" );
?>

<?php
class PDF extends FPDF
{
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $cname = $_POST['cont'];
        $cont = strtolower(str_replace(' ','_',$cname)); 
        // Page number
        $this->Cell(0,10,"https://www.ngaituk_online_".date('d/m/Y')."_".$cont.".pdf",0,0,'L');
    }
}

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
$reportDate = "Report Date :-  " . date('d-m-Y');
$reportDateYPos = 6;
$logoFile = "img/logo.jpg";
$logoXPos = 100;
$logoYPos = 0;
$logoWidth = 110;
// End configuration
// email stuff (change data below)
$to = "myemail@example.com"; 
$from = "me@example.com"; 
$subject = "send email with pdf attachment"; 
$message = "<p>Please see the attachment.</p>";

// Create the page */
$pdf = new PDF( 'P', 'mm', 'A4' );

$pdf->AddPage();

// Logo
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

/* Report Frequency, Date, Contractor name */
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 10 );



/* Main Contents, Fetching data from mysql database according to query passed */

if(isset($_POST['today']))
  {
  $cname = $_POST['cont']; //UPPER CASE
  $contn = strtolower(str_replace(' ','_',$cname));  // LOWER CASE
  $wrktb = $contn . "_wrk";  //Work database
  $hvwtb = $contn . "_hvw";
  $tdate = date('Y-m-d');    // Current date
    
    $pdf->Cell(50,10,'Report Frequency :- '.' Daily ',0,0,'L');
    $pdf->Ln( 7 );
    $pdf->Cell( 50, 10, $reportDate, 0, 0, 'L' );
    $pdf->Ln( 7 );
     $pdf->Cell(50,10,'Contractor :- '.$cname,0,0,'L');
          $pdf->Line(0,37,210,37);
          $pdf->Ln( 10 );


   

    






    //$pdf->AddPage();      
    
    $sql = "SELECT DISTINCT crw_no FROM $wrktb WHERE t_date = CURDATE() ORDER BY crw_no ";
    $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
      while($row = mysqli_fetch_assoc($result) )
      {
         $crw[] = $row['crw_no'];
      }
    
          $count = count($crw);
          

          // Display Records
          $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
          $pdf->SetFont( 'Arial', '', 10.5 );
            
          $pdf->Ln( 10 );
          $pdf->Cell( 10, 6,'Crew',0, 0, 'C');
          $pdf->Cell( 17, 6,'Id',0, 0, 'C');
          $pdf->Cell( 25, 6, 'F Name',0, 0, 'C');
          $pdf->Cell( 15, 6, 'L Name',0, 0, 'C');
          $pdf->Cell( 24, 6, 'Start',0, 0, 'C');
          $pdf->Cell( 24, 6, 'Finish',0, 0, 'C');
          $pdf->Cell( 16, 6, 'Lunch',0 , 0, 'C');
          $pdf->Cell( 26, 6, 'Job',0 , 0, 'C');
          $pdf->Cell( 10, 6, 'Hours', 0, 0, 'C');
          $pdf->Cell( 25, 6, 'Notes', 0, 0, 'C');

          $pdf->Ln( 10 );
          $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
          $pdf->SetFont( 'Arial', '', 10 );
        
          for($i=0;$i<$count;$i++)
          {
            $crew = $crw[$i];
            $counter = 0;
    


//SELECT SalesOrderID,
//LineTotal,
//(SELECT AVG(LineTotal)
//   FROM Sales.SalesOrderDetail) AS AverageLineTotal
//FROM   Sales.SalesOrderDetail;
            //$pdf->Cell( 10, 6,$hvwtb,1, 0, 'C');
           


            $sql1 = "SELECT * FROM $wrktb WHERE t_date = CURDATE() AND crw_no = $crew";
            $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
            
            while($row1 = mysqli_fetch_assoc($result1) )
            {
               
                
                
                $pdf->Cell( 10, 6,$crew,0, 0, 'C');
                $pdf->Cell( 17, 6, $row1['e_id'], 0, 0, 'C');
                $pdf->Cell( 25, 6, $row1['f_name'], 0, 0, 'C');
                $pdf->Cell( 15, 6, $row1['l_name'], 0, 0, 'C');
                $s_time = date("g:i a", strtotime($row1["s_time"]));
                $pdf->Cell( 24, 6, $s_time, 0, 0, 'C');
                $f_time = date("g:i a", strtotime($row1["f_time"]));
                $pdf->Cell( 24, 6, $f_time, 0, 0, 'C');
                $pdf->Cell( 16, 6, $row1['n_lunch'], 0, 0, 'C');
                $jobcode = strtoupper($row1['j_code']);
                $pdf->Cell( 26, 6,$jobcode , 0, 0, 'C');
                if($row1['notes'] == "" || $row1['notes'] == "n/a")
                { 
                $notes = "--";  
                }
                else{
                $notes = $row1['notes'];
                }



                $pdf->Cell( 10, 6, $row1['t_hrs'],0, 0, 'C');
                


                $pdf->Cell( 25, 6, $notes, 0, 0, 'C');
                $pdf->Ln( 5 );
              $counter++;
            }

            $pdf->Ln(3);
    
            $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE t_date = CURDATE() AND crw_no = $crew";
            $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
            while($row2 = mysqli_fetch_assoc($result2))
            {
              $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
              $pdf->SetFont( 'Arial', '', 10.5 );
              $pdf->SetX(10);
              $pdf->Cell( 60, 6, "Crew : -  " . $crew , 0, 0, 'L');
              $pdf->Cell( 130, 6, "Hours : - " . $row2['SUM(t_hrs)'] , 0, 0, 'R');
              $pdf->Ln( 7 );
              
              $pdf->Cell( 60, 6, "Workers : -  " . $counter , 0, 0, 'L');
              $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
              $pdf->SetFont( 'Arial', '', 10 );
            }  
            $sql = "SELECT n_o_b FROM $hvwtb WHERE t_date = CURDATE() AND crw_no = $crew";    
            $result = mysqli_query($db,$sql) or die("Bad SQL: $sql"); 
            while($row = mysqli_fetch_assoc($result) )
            {
              $pdf->Cell( 130, 6,"Total Bins Picked : - " . $row['n_o_b'],0, 0, 'L');
            }




              $pdf->Ln( 15 );
            }
                     
 
          $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE t_date = CURDATE() ";
          $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
          while($row2 = mysqli_fetch_assoc($result2))
          {
            $pdf->SetX(160);
            $pdf->Cell( 30, 6, "Total ". $row2['type']. " Hrs". "  =  ". $row2['SUM(t_hrs)']." hrs", 0, 0, 'C');
          }

          $pdf->Ln( 15 );
          
          $sql2 = "SELECT SUM(n_o_b) FROM $hvwtb WHERE t_date = CURDATE() ";
          $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
          while($row2 = mysqli_fetch_assoc($result2))
          {
            $pdf->SetX(160);
            $pdf->Cell( 30, 6, "Total ". $row2['type']. " Bins ". "  =  ". $row2['SUM(n_o_b)']." hrs", 0, 0, 'C');
          }
          



          $rdate = date('d_m_Y');
         
          //$pdf->SetX(50);

         



    }
  
    /*
    $sql=mysql_query("INSERT INTO book(accno,author,title)
                  SELECT accno,author,title FROM accession where accno='$ac'");
    */




    /**** Weekly Report *****/
  
    else if(isset($_POST['week']))
    {
    $weekDate = $_POST['weekDate'];
    $cname = $_POST['cont'];  //UPPER CASE
    $contn = strtolower(str_replace(' ','_',$cname));  // LOWER CASE
    $wrktb = $contn . "_wrk";  //Work database
    $tdate = date('Y-m-d');  // Current date
    
     
      
      //Select Job Codes For Particular Week
      $sql = "SELECT DISTINCT j_code FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( '$weekDate' , 1 ) AND YEAR( t_date) = YEAR( '$weekDate' ) ";
      $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
        while($row = mysqli_fetch_assoc($result) )
        {
           $job[] = $row['j_code'];
        }

      //Select Dates Of Particular Week 
      $sql = "SELECT DISTINCT t_date FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( '$weekDate' , 1 ) AND YEAR( t_date) = YEAR( '$weekDate' ) ORDER BY t_date ";
      $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
        while($row = mysqli_fetch_assoc($result) )
        {
           $t_date[] = $row['t_date'];
        }  

      //Select Crew No For Particular Week
      $sql = "SELECT DISTINCT crw_no FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( '$weekDate' , 1 ) AND YEAR( t_date) = YEAR( '$weekDate' )";
      $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
        while($row = mysqli_fetch_assoc($result) )
        {
           $crw[] = $row['crw_no'];
           
        }
       
        //Count Job Codes For Particular Week
            $count = count($job);

        //Counts Days Worked In Particular Week
            $count1 = count($t_date);

        //Count Crew No For Particular Week
            $count2 = count($crw);

        $pdf->Cell(50,10,'Week Ending :- '. date("d-m-Y", strtotime($weekDate)), 0 , 0 ,'L');
        //$pdf->Cell(50,10,'Week Ending:- '. $weekDate,0,0,'L');
        $pdf->Ln( 7 );
        $pdf->Cell( 50, 10, $reportDate, 0, 0, 'L' );
        $pdf->Ln( 7 );

            
            
            
                  

            //$pdf->Cell(50,10,"Job Codes :- ".$count."  /  "."Week Dates :- ".$count1."  /  "."Crew Nos :- " .$count2,0,0,'L'); 
            //$pdf->Ln( 10 );
            /*$pdf->Cell(50,10,$t_date[0],0,0,'L'); 
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[1],0,0,'L'); 
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[2],0,0,'L'); 
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[3],0,0,'L');        
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[4],0,0,'L');    
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[5],0,0,'L');    
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[6],0,0,'L');  
            $pdf->Ln( 10 );
            $pdf->Cell(50,10,$t_date[6],0,0,'L');          
        
            */

            $pdf->Cell(50,10,'Contractor :- '.$cname,0,0,'L');
            $pdf->Line(0,37,210,37);
            $pdf->Ln( 10 );

            // Display Records
            $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
            $pdf->SetFont( 'Arial', '', 10.5 );
            $pdf->Ln( 10 );

            $pdf->Cell( 30, 6,'Job Code',0, 0, 'C');  
            $pdf->Cell( 30, 6,'Crew No',0, 0, 'C');  

            $pdf->Cell( 130, 6,'Total Hours',0, 0, 'R');
            /* $pdf->Cell( 10, 6,'Crew',0, 0, 'C');
            $pdf->Cell( 17, 6,'Id',0, 0, 'C');
            $pdf->Cell( 25, 6, 'F Name',0, 0, 'C');
            $pdf->Cell( 21, 6, 'L Name',0, 0, 'C');
            $pdf->Cell( 24, 6, 'Start',0, 0, 'C');
            $pdf->Cell( 24, 6, 'Finish',0, 0, 'C');
            $pdf->Cell( 16, 6, 'Lunch',0 , 0, 'C');
            $pdf->Cell( 26, 6, 'Job',0 , 0, 'C');
            $pdf->Cell( 30, 6, 'Hours', 0, 0, 'C'); */
            $pdf->Ln( 10 );
            $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
            $pdf->SetFont( 'Arial', '', 10 );
          
            for($i=0;$i<$count;$i++) //For Job Code
            {
              $job1 = $job[$i];
              $counter = 0;
              for($j=0;$j<$count1;$j++) //For Particular date
                {
                  $t_date1 = $t_date[$j];
                  $counter1=0;
                  for($k=0;$k<$count2;$k++) //For Particular Crew
                  {
                  $crw1 = $crw[$k];
                  $counter2 = 0;
                  
                  
                  
                  
                  //$pdf->Cell( 10, 6,$job[0],0, 0, 'C'); 
                  //$pdf->Cell( 10, 6,$job[1],0, 0, 'C'); 
                  //$pdf->Cell( 10, 6,$job[2],0, 0, 'C');  
                  //$pdf->Cell( 10, 6,$job[3],0, 0, 'C');   

                  //SELECT WEEK(orderDate) week_no , COUNT(*) FROM orders WHERE YEAR(orderDate) = 2003 GROUP BY WEEK(orderDate);


                  
                  $sql1 = "SELECT * FROM $wrktb WHERE j_code = '$job1' AND t_date = '$t_date1' AND crw_no = '$crw1' ";
                  $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
                  


                  while($row1 = mysqli_fetch_assoc($result1) )
                  {
                     if($counter == 0)
                     {
                     $pdf->Ln(5);
                     $jobU = strtoupper($job1); 
                     $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
                     $pdf->Cell( 30, 6, $jobU, 0, 0, 'C');
                     $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
                     //$pdf->Cell( 16, 6,'Crew', 0, 0, 'C');
                     //$pdf->Cell( 16, 6,'Total Hrs', 0, 0, 'C');
                     $pdf->Ln(7); 
                         
                     //$pdf->Cell( 30, 6, $row1['t_date'], 0, 0, 'C');
                     //$pdf->Cell( 16, 6, $row1['crw_no'], 0, 0, 'C');

                     }
                                         
                       



                     if($counter1 == 0)
                         {
                          $pdf->Cell( 30, 6, date("d-m-Y", strtotime($row1['t_date'])), 0, 0, 'C');
                          $pdf->Cell( 30, 6, $row1['crw_no'], 0, 0, 'C');
                          //$pdf->Ln(1);
                          //$pdf->Cell( 30, 6, $row1['t_hrs'], 0, 0, 'C');
                         }else if($counter2 == 0){
                          $pdf->Cell( 30, 6,'', 0, 0, 'C');
                          $pdf->Cell( 30, 6, $row1['crw_no'], 0, 0, 'C');
                         }

                      //$pdf->Cell( 10, 6, $crew ,0, 0, 'C');
                      //$pdf->Cell( 17, 6, $row1['e_id'], 0, 0, 'C');
                      //$pdf->Cell( 25, 6, $row1['f_name'], 0, 0, 'C');
                      //$pdf->Cell( 21, 6, $row1['l_name'], 0, 0, 'C');
                     // $s_time = date("g:i a", strtotime($row1["s_time"]));
                     // $pdf->Cell( 24, 6, $s_time, 0, 0, 'C');
                     // $f_time = date("g:i a", strtotime($row1["f_time"]));
                     // $pdf->Cell( 24, 6, $f_time, 0, 0, 'C');
                      




                      //$pdf->Cell( 16, 6, $row1['t_date'], 0, 0, 'C');
                      //$pdf->Cell( 16, 6, $row1['crw_no'], 0, 0, 'C');
                      
                      //$pdf->Cell( 26, 6, $row1['j_code'], 0, 0, 'C');
                      //$pdf->Cell( 30, 6, $row1['t_hrs'], 0, 0, 'C');
                      //$pdf->Ln(2);
                    $counter++;
                    $counter1++;
                    $counter2++;
                  }

              //$pdf->Ln(3);
      
              $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE j_code = '$job1' AND t_date = '$t_date1' AND crw_no = '$crw1'";
              $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
                  while($row2 = mysqli_fetch_assoc($result2))
                  {
                    //$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
                    $pdf->SetFont( 'Arial', '', 10.5 );
                    //$pdf->SetX(10);
                    //$pdf->Cell( 60, 6, "Crew : -  " . $crew , 0, 0, 'L');
                    //$pdf->Cell( 60, 6, "Worker : -  " . $counter , 0, 0, 'C');
                    //if($count2 <= $count)
                    //{
                    if( !$row2['SUM(t_hrs)'] == NULL )
                    {
                    $pdf->Cell( 95, 6,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -',0, 0, 'L');
                    $pdf->Cell( 30, 6, $row2['type'].$row2['SUM(t_hrs)'] , 0, 0, 'R');
                    $pdf->Ln(7);
                    }//}
                    $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
                    $pdf->SetFont( 'Arial', '', 10 );
                    
                  }
                }
              $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE j_code = '$job1' AND t_date = '$t_date1' ";
              $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
                  while($row2 = mysqli_fetch_assoc($result2))
                  {
                    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
                    $pdf->SetFont( 'Arial', '', 10.5 );
                    //$pdf->SetX(10);
                    //$pdf->Cell( 60, 6, "Crew : -  " . $crew , 0, 0, 'L');
                    //$pdf->Cell( 60, 6, "Worker : -  " . $counter , 0, 0, 'C');
                    //if($count2 <= $count)
                    //{
                    if( !$row2['SUM(t_hrs)'] == NULL )
                    {
                    $pdf->Cell( 175, 6,' >>> ',0, 0, 'R');
                    $pdf->Cell( 10, 6,$row2['type'].$row2['SUM(t_hrs)'] , 0, 0, 'R');
                    $pdf->Ln(8);
                    }//}
                    $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
                    $pdf->SetFont( 'Arial', '', 10 );
                    
                  }

              }
            
            }           
   
            $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( '$weekDate' , 1 ) AND YEAR( t_date) = YEAR( '$weekDate' )";
            $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
            while($row2 = mysqli_fetch_assoc($result2))
            {
              $pdf->Ln(7);
              $pdf->SetX(160);
              $pdf->Cell( 40, 6, "Total ". $row2['type']. " Hrs". "  =  ". $row2['SUM(t_hrs)']." hrs", 0, 0, 'C');
            }
    $rdate = "w_end_".date("d-m-Y", strtotime($weekDate));
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
*/


//$pdf->SetY(-15);
    // Arial italic 8
//$pdf->SetFont('Arial','I',10);
    // Page number
//$pdf->Cell(0,10,"ngaituk_online_".$contn ."_".date('d_m_Y'),0,0,'C');

$pdf->AddPage();

            

            // Display Records
            $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
            $pdf->SetFont( 'Arial', '', 10.5 );
            

            $pdf->Cell( 70, 6,'Job Code',0, 0, 'L');  
            $pdf->Cell( 50, 6,'Job Title',0, 0, 'L');  
            $pdf->Line(0,20,210,20);
            $pdf->Ln(15);





$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$sql2 = "SELECT * FROM job_code";
$result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
while($row2 = mysqli_fetch_assoc($result2))
{
$pdf->Cell( 70, 6,$row2['j_code'], 0, 0, 'L');
$pdf->Cell( 50, 6,$row2['j_title'], 0, 0, 'L');
$pdf->Ln(7);
}


/*Serve the PDF */
$pdf->SetTitle($contn ."_".$rdate);
//$pdf->SetFavicon("hello");
$pdf->Output($contn ."_".$rdate. ".pdf", "I" );
//ob_end_flush(); 
?>














