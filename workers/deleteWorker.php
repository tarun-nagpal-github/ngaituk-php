<?php
  include "../config.php";   
$json = file_get_contents('php://input');
$data = json_decode($json);
      $id =  htmlspecialchars($_GET["id"]);



if(
    !empty($id) 
) 
 { 
 	$query = "DELETE from `workers` WHERE id=$id";  
$myArray = array();
if ($result = $db->query($query)) {     
    http_response_code(200);
} else {
	http_response_code(400);
}

 }