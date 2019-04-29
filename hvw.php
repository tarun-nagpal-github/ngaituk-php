<?php
require_once( "config.php" );
require_once( "session.php" );
?>

<?php

if(isset($_POST['save']))
  {
  $cname = $_POST['cont']; //UPPER CASE
  $contn = strtolower(str_replace(' ','_',$cname));  // LOWER CASE
  $crew = $_POST['crw_no']; //Crew No
  $nob = $_POST['n_o_b']; //No of bins
  

  $h_date = date("Y-m-d", strtotime($_POST['h_date']));
  $hvwtb = $contn . "_hvw";

	 $sql = "INSERT INTO $hvwtb (t_date, crw_no, n_o_b) VALUES ('$h_date','$crew','$nob')";
	 if($db->query($sql)===TRUE)
	 {
	    echo "data inserted" ;
	   //echo $wrknm;
	 }

  }


  
    
    
  
?>