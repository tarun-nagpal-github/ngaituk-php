<?php
include "../config.php"; 
$json = file_get_contents('php://input');
$data = json_decode($json);
// print "<pre>";
//  print_r($data);
// print "</pre>";

// die("DATA FINALLY"); 

try {
		foreach ($data as &$value) {  
		       $query = "INSERT INTO timesheet 
		                		(e_id,		  t_date,       crw_no, f_name, l_name, s_time, f_time, n_lunch, j_code, t_hrs, notes)
		                 VALUES 
		                 		( $value->id, $value->date, $value->f_name, $value->l_name, $value->id, $value->id, $value->id, $value->id, $value->id, $value->id, $value->id)"; 
		       $result = $db->query($query);
		}
		echo json_encode(array(123 => 123 ));
		http_response_code(200);
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
  echo json_encode(array(123 => 123 ));
  http_response_code(400);
}



 


$db->close();