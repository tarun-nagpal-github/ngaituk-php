<?php

  include "../config.php";   
  include "../utils/helper.php";


// echo json_response(); // {"status":true,"message":"working"}




$json = file_get_contents('php://input');
$data = json_decode($json);
 

if(
    !empty($data->name) &&
    !empty($data->address) 
) 
 {
$query = "INSERT INTO contractors (c_name, c_add)
               VALUES ('$data->name','$data->address')";
$myArray = array(); 
 

if ($result = $db->query($query)) { 
    $myArray[] = $result;        
    echo json_response($myArray, 200, "Added Record!", null);
}  else {	
	echo json_response([], 400);
}
}
else {
echo json_response([], 400);
}
$db->close();