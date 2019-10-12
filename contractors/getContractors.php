<?php
  include "../config.php";
  include "../utils/helper.php"; 

$query = "SELECT * FROM `contractors`"; 

$myArray = array();
if ($result = $db->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }    
    echo json_response($myArray, 200, "", null);
}

$result->close();
$db->close();