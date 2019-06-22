<?php
  include "../config.php";   
$json = file_get_contents('php://input');
$data = json_decode($json);
  
if(
    !empty($data->id) 
) 
 { 
 	$query = "DELETE from `workers` WHERE id=$data->id";  
$myArray = array();
if ($result = $db->query($query)) {     
    http_response_code(200);
} else {
	http_response_code(400);
}

 }