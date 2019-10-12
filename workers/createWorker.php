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
$query = "INSERT INTO workers (f_name, l_name, contractor_id, e_id,   v_type,  v_exp, d_o_b)
               VALUES ('$data->firstName','$data->lastName','$data->contractor','$data->employeeId',
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