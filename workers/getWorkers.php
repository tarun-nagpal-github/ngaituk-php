<?php
  include "../config.php"; 

$query = "SELECT * FROM `workers`"; 

$myArray = array();
if ($result = $db->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$db->close();