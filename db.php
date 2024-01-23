<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

//create connection
$db = new Mysqli($servername, $username, $password, $dbname);


//check connection status
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }
// echo "Connected successfully";
