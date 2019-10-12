<?php
  include "../config.php";   
  include "../utils/helper.php"; 

$json = file_get_contents('php://input');
$data = json_decode($json);
$id =  htmlspecialchars($_GET["id"]);

if(!empty($id)){ 
	$query = "DELETE from `contractors` WHERE s_no=$id";  
	$myArray = array();
	if ($result = $db->query($query)) {     	    
	    echo json_response($result, 200, "", null);
	} else {
		echo json_response($result, 400, "", null);		
	}
} else {
		echo json_response($result, 400, "", null);		
}