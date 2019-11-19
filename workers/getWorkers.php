<?php
include "../config.php"; 
$json = file_get_contents('php://input');
$data = json_decode($json);

<<<<<<< HEAD
 $id = ($_REQUEST['id']);

if(!empty($id)){
=======
// print "DATA";
// print_r($_REQUEST[id]);
// die("json");

$id = $_REQUEST['id'];

if(($id)){
>>>>>>> b885f1d6c4d9f7c06dadfd0b2ebaf0e54063afc9
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