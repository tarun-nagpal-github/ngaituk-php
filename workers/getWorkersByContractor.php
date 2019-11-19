<?php
  include "../config.php"; 
  $json = file_get_contents('php://input');
$data = json_decode($json);

 $id = ($_REQUEST['id']);

if(($id)){
	$query = "SELECT * FROM `workers` WHERE contractor_id=$id";   
} else {
    $query = "SELECT * FROM `workers`";     
}




$myArray = array();
if ($result = $db->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    	
            $myArray[] = $row;
    }
// print "<pre>";
// print_r($myArray);
// print "</pre>";
// die();

   echo json_encode($myArray);
    http_response_code(200);

    // echo json_encode($myArray);
}

$result->close();
$db->close();