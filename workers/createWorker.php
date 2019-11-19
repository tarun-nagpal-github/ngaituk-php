<?php
  include "../config.php";   
$json = file_get_contents('php://input');
$data = json_decode($json);

if(
    !empty($data->firstName) &&
    !empty($data->contractor) &&
    !empty($data->visaType)
) 
 {
  // Get the last inserted ID
  $getLastIdQuery =  " SELECT MAX(id) as id FROM `workers` ";
  if ($result = $db->query($getLastIdQuery)) { 
      $e_id =  $result->fetch_object()->id;
  }  else {
    // Get the random number if SQL Fails
     $e_id =  rand ( 200 , 999 );
  }

 // Emp ID Generated 
 $e_id_new = strtoupper(substr($data->firstName, 0, 1).substr($data->lastName, 0, 1)."000".$e_id);  

$query = "INSERT INTO workers (f_name, l_name, contractor_id, e_id,   v_type,  v_exp, d_o_b)
               VALUES ('$data->firstName','$data->lastName','$data->contractor','$e_id_new',
                      '$data->visaType','$data->visaExpiry','$data->dateOfBirth')";
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