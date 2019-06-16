<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ngaituk";

$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
//$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
//echo $mysqli->host_info . "\n";

$db = new mysqli("127.0.0.1", "root", "", "ngaituk", 3306);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


date_default_timezone_set('NZ');



?>
