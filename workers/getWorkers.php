<?php
include "../config.php"; 
$json = file_get_contents('php://input');
$data = json_decode($json);


// print "DATA";
// print_r($_REQUEST[id]);
// die("json");

$id = $_REQUEST['id'];

if(($id)){
	$query = "SELECT * FROM `workers` WHERE id=$id";   
} else {
    $query = "SELECT * FROM `workers`";     
}


$myArray = array();
if ($result = $db->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$db->close();