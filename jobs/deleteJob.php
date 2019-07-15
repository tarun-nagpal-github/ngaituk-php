<?php
  include "../config.php";   
$json = file_get_contents('php://input');
$data = json_decode($json);
$s_no =  htmlspecialchars($_GET["s_no"]);



if(
    !empty($s_no) 
) 
 { 
 	$query = "DELETE from `job_code` WHERE s_no=$s_no";  
$myArray = array();
if ($result = $db->query($query)) {     
    http_response_code(200);
} else {
	http_response_code(400);
}

 }