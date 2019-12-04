<?php
include "../config.php"; 
$json = file_get_contents('php://input');
$data = json_decode($json); 


 ini_set('display_errors',1);
error_reporting(E_ALL);

try {
if(is_array($data)) {

		foreach ($data as $key=>$value) {  
	       $query = "INSERT INTO `timesheet`
	                		(e_id, t_date, crw_no, f_name, l_name, s_time, f_time, n_lunch, j_code, t_hrs, notes)
	                 VALUES 
	                 		( '$value->id', '$value->date', '$value->e_id', '$value->f_name', '$value->l_name', '$value->startTime', '$value->endTime', 1, '$value->jobCode', '$value->hours', 1)"; 
	                 		// print_r($query); 
	                 		// $result = mysql_query($query) or trigger_error(mysql_error()." ".$query);

		        $result = $db->query($query);	

		        // print "RESULT";
		        // var_dump($db);  
		        // print "RESULT";
		        // die("FINAL ONE");
		}
		echo json_encode(array('message' => 'data saved', 'result' => $result));
		http_response_code(200);
	} else {
		print "<pre>";
var_dump($data);
print "</pre>";

		die("NO DATA");
	}
} 
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();  
  http_response_code(400);
}
$db->close();