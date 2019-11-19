<?php
  include "../config.php"; 

 
 $id = ($_REQUEST['id']);



if(!empty($id)){
	$query = "SELECT * FROM `job_code` WHERE id=$id";   
} else {
    $query = "SELECT * FROM `job_code`";     
}

 // die($query);
$myArray = array();
if ($result = $db->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$db->close();