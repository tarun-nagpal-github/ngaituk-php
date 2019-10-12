<?php
  include "../config.php";   
$json = file_get_contents('php://input');
$data = json_decode($json);
if(
    !empty($data->title) &&
    !empty($data->jobCode)  
) 
 {
$query = "INSERT INTO job_code (j_title, j_code)
               VALUES ('$data->title','$data->jobCode' )"; 
$myArray = array(); 
// print_r($query); die();

if ($result = $db->query($query)) { 
    $myArray[] = $result;
    echo json_encode($myArray);
    http_response_code(200);
}  else {
  http_response_code(400);
}
}
$db->close();