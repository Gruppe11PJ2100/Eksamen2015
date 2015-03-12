<?php

$db_adress = "127.0.0.1";
$db_name = "myDB";
$db_user =  "root";
$db_pass = "";

$conn = new mysqli($db_adress, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

?>