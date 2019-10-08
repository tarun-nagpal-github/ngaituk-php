<?php

  include "../config.php";   

function json_response($data = null, $code = 200, $message = [], $erros = [])
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    // ok, validation error, or failure
    header('Status: '.$code);
    // return the encoded json
    return json_encode(array(
        'status' => $code, // success or not?
        'data' => $data,
        'message' => $message,
        'erros' => $erros,

        ));
}

echo json_response([1,2,3,4]); // {"status":true,"message":"working"}




// $json = file_get_contents('php://input');
// $data = json_decode($json);
 

// if(
//     !empty($data->name) &&
//     !empty($data->address) 
// ) 
//  {
// $query = "INSERT INTO contractors (c_name, c_add)
//                VALUES ('$data->name','$data->address')";
// $myArray = array(); 
 

// if ($result = $db->query($query)) { 
//     $myArray[] = $result;
//     echo json_encode($myArray);
//     echo json_encode([1,2,3,4,5]);
//     http_response_code(200);
// }  else {
// 	echo json_encode([1,2,3,4,5]);

//   http_response_code(400);
// }
// }
// $db->close();